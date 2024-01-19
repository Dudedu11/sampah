<?php

namespace App\Http\Controllers\induk;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiIndustri;
use App\Models\Induk;
use App\Models\Industri;
use App\Models\SampahTreatment;
use App\Models\TransaksiIndustri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransaksiIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        if (session('role') == 3) {
            $induk = Induk::where('user_id', $user)->first();
            $transaksiIndustri = TransaksiIndustri::where('induk_id', $induk->id)->get();
        } else {
            $industri = Industri::where('user_id', $user)->first();
            $transaksiIndustri = TransaksiIndustri::where('industri_id', $industri->id)->get();
        }
        return view('induk.transaksiIndustri.index', [
            'transaksiIndustris' => $transaksiIndustri
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();
        $industris = Industri::orderBy('nama', 'asc')->get();
        $sampahTreatments = SampahTreatment::where('induk_id', $induk->id)->get();

        return view('induk.transaksiIndustri.create', [
            'industris' => $industris,
            'sampahTreatments' => $sampahTreatments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'industri_id' => 'required|integer',
            'tanggal' => 'required|date',
            'sampah_treatment.*' => 'required|integer',
            'jumlah.*' => 'required|integer',
        ]);

        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();

        $total = 0;
        $index = 0;
        foreach ($request->sampah_treatment as $item) {
            $sampahTreatment = SampahTreatment::where('id', $item)->first();
            $total += $sampahTreatment->harga * $request->jumlah[$index];
            $index++;
        }

        $transaksiIndustri = TransaksiIndustri::create([
            'industri_id' => $request->industri_id,
            'induk_id' => $induk->id,
            'tanggal' => $request->tanggal,
            'total' => $total
        ]);

        $index = 0;
        foreach ($request->sampah_treatment as $item) {
            $sampahTreatment = SampahTreatment::where('id', $item)->first();
            DetailTransaksiIndustri::create([
                'transaksi_id' => $transaksiIndustri->id,
                'sampah_treatment' => $sampahTreatment->id,
                'jumlah' => $request->jumlah[$index],
                'total' => $sampahTreatment->harga * $request->jumlah[$index]
            ]);

            $sampahTreatment->stok += $request->jumlah[$index];
            $sampahTreatment->update([
                'stok' => $sampahTreatment->stok
            ]);
            $index++;
        }

        return $this->redirectRoute(transaksiIndustri: $transaksiIndustri);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = DetailTransaksiIndustri::where('transaksi_id', $id)->get();
        return view('induk.transaksiIndustri.detail', [
            'details' => $details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Redirect route based on condition.
     *
     * @param  mixed $transaksiIndustri
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        TransaksiIndustri $transaksiIndustri,
        String $route = 'transaksiIndustri.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($transaksiIndustri) {
            return redirect()
                ->route($route)
                ->with([
                    "success" => $successMsg
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "error" => $errorMsg
                ]);
        }
    }
}
