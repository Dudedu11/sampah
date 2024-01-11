<?php

namespace App\Http\Controllers;

use App\Models\DetailPenguranganSampahUnit;
use App\Models\JenisSampahUnit;
use App\Models\PenguranganSampahUnit;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenguranganSampahUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();
        $pengurangan = PenguranganSampahUnit::where('unit_id', $unit->id)->get();
        return view('penguranganSampahUnit.index',[
            'pengurangans' => $pengurangan
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
        $unit = Unit::where('user_id', $user)->first();
        $jenisSampahs = JenisSampahUnit::where('unit_id', $unit->id)
            ->orderBy('nama', 'asc')
            ->get();
        return view('penguranganSampahUnit.create',[
            'jenisSampahs' => $jenisSampahs
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
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'jenis_sampah_unit_id.*' => 'required|integer',
            'jumlah.*' => 'required|integer',
        ]);

        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();

        $total = 0;
        $index = 0;
        foreach ($request->jenis_sampah_unit_id as $item) {
            $jenisSampah = JenisSampahUnit::where('id', $item)->first();
            $total += $jenisSampah->harga_beli * $request->jumlah[$index];
            $index++;
        }

        $pengurangan = PenguranganSampahUnit::create([
            'unit_id' => $unit->id,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'total' => $total
        ]);

        $unit->saldo += $total;
        $unit->update([
            'saldo' => $unit->saldo
        ]);

        $index = 0;
        foreach ($request->jenis_sampah_unit_id as $item) {
            $jenisSampah = JenisSampahUnit::where('id', $item)->first();
            DetailPenguranganSampahUnit::create([
                'pengurangan_id' => $pengurangan->id,
                'jenis_sampah_unit_id' => $jenisSampah->id,
                'jumlah' => $request->jumlah[$index],
                'total' => $jenisSampah->harga_beli * $request->jumlah[$index]
            ]);

            $jenisSampah->stok -= $request->jumlah[$index];
            $jenisSampah->update([
                'stok' => $jenisSampah->stok
            ]);
            $index++;
        }

        return $this->redirectRoute(pengurangan: $pengurangan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = DetailPenguranganSampahUnit::where('pengurangan_id', $id)->get();
        return view('penguranganSampahUnit.detail', [
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
     * @param  mixed $pengurangan
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        PenguranganSampahUnit $pengurangan,
        String $route = 'penguranganSampahUnit.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($pengurangan) {
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
