<?php

namespace App\Http\Controllers\induk;

use App\Http\Controllers\Controller;
use App\Models\Induk;
use App\Models\JenisSampahInduk;
use App\Models\KonversiSampah;
use App\Models\SampahTreatment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KonversiSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();
        $konversiSampah = KonversiSampah::where('induk_id', $induk->id)->get();
        return view('induk.konversiSampah.index', [
            'konversiSampahs' => $konversiSampah
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
        $jenisSampah = JenisSampahInduk::where('induk_id', $induk->id)
        ->orderBy('nama', 'asc')
        ->get();
        $sampahTreatment = SampahTreatment::where('induk_id', $induk->id)
        ->orderBy('nama', 'asc')
        ->get();
        return view('induk.konversiSampah.create',[
            'jenisSampahs' => $jenisSampah,
            'sampahTreatments' => $sampahTreatment
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
            'tanggal' => 'required|date',
            'sampah_id' => 'required|integer',
            'jumlah_sampah' => 'required|integer',
            'treatment_id' => 'required|integer',
            'jumlah_treatment' => 'required|integer',
        ]);

        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();

        $konversiSampah = KonversiSampah::create([
            'induk_id' => $induk->id,
            'sampah_id' => $request->sampah_id,
            'jumlah_sampah' => $request->jumlah_sampah,
            'treatment_id' => $request->treatment_id,
            'jumlah_treatment' => $request->jumlah_treatment,
            'tanggal' => $request->tanggal
        ]);

        $jenisSampah = JenisSampahInduk::where('id', $request->sampah_id)->first();
        $jenisSampah->stok -= $request->jumlah_sampah;
        $jenisSampah->update([
            'stok' => $jenisSampah->stok
        ]);

        $sampahTreatment = SampahTreatment::where('id', $request->treatment_id)->first();
        $sampahTreatment->stok += $request->jumlah_treatment;
        $sampahTreatment->update([
            'stok' => $sampahTreatment->stok
        ]);

        return $this->redirectRoute(konversiSampah: $konversiSampah);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  mixed $konversiSampah
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        KonversiSampah $konversiSampah,
        String $route = 'konversiSampah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($konversiSampah) {
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
