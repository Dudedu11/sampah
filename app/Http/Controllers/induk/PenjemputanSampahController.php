<?php

namespace App\Http\Controllers\induk;

use App\Http\Controllers\Controller;
use App\Models\DetailPenjemputanSampahUnit;
use App\Models\Induk;
use App\Models\JenisSampahInduk;
use App\Models\JenisSampahUnit;
use App\Models\PenjemputanSampahUnit;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenjemputanSampahController extends Controller
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
        $penjemputan = PenjemputanSampahUnit::where('induk_id', $induk->id)->get();
        return view('induk.penjemputanSampah.index', [
            'penjemputans' => $penjemputan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'aksi' => 'required|string',
            'id' => 'required|integer',
        ]);
        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();
        $penjemputan = PenjemputanSampahUnit::where('id', $request->id)->first();

        if ($request->aksi == "tolak") {
            $penjemputan->update([
                'status' => false,
                'tanggal' => date('Y-m-d')
            ]);
        } else {
            $penjemputan->update([
                'status' => true,
                'tanggal' => date('Y-m-d')
            ]);

            $unit = Unit::where('id', $penjemputan->unit_id)->first();
            $unit->saldo += $penjemputan->total;
            $unit->update([
                'saldo' => $unit->saldo
            ]);

            $induk->saldo -= $penjemputan->total;
            $induk->update([
                'saldo' => $induk->saldo
            ]);

            $detail = DetailPenjemputanSampahUnit::where('penjemputan_id', $request->id)->get();

            foreach($detail as $item){
                $sampahUnit = JenisSampahUnit::where('id', $item->jenis_sampah_unit_id)->first();
                $sampahUnit->stok -= $item->jumlah;
                $sampahUnit->update([
                    'stok' => $sampahUnit->stok
                ]);

                $sampahInduk = JenisSampahInduk::where('nama', $item->jenisSampahUnit->nama )->where('induk_id', $induk->id)->first();
                $sampahInduk->stok += $item->jumlah;
                $sampahInduk->update([
                    'stok' => $sampahInduk->stok
                ]);
            }
        }

        return $this->redirectRoute(penjemputan: $penjemputan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjemputan = PenjemputanSampahUnit::where('id', $id)->first();
        $details = DetailPenjemputanSampahUnit::where('penjemputan_id', $id)->get();
        return view('induk.penjemputanSampah.detail', [
            'penjemputan' => $penjemputan,
            'id' => $id,
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
     * @param  mixed $penjemputan
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        PenjemputanSampahUnit $penjemputan,
        String $route = 'penjemputanSampah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($penjemputan) {
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
