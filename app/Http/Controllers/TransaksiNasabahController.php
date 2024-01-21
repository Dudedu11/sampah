<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiNasabah;
use App\Models\JenisSampahUnit;
use App\Models\Nasabah;
use App\Models\TransaksiNasabah;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransaksiNasabahController extends Controller
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
        $transaksi = TransaksiNasabah::where('unit_id', $unit->id)->get();
        return view('transaksiNasabah.index', [
            'transaksis' => $transaksi
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
        $nasabahs = Nasabah::where('unit_id', $unit->id)
        ->orderBy('nama', 'asc')
        ->get();
        $jenisSampahs = JenisSampahUnit::where('unit_id', $unit->id)
            ->orderBy('nama', 'asc')
            ->get();
        return view('transaksiNasabah.create', [
            'nasabahs' => $nasabahs,
            'jenisSampahs' => $jenisSampahs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required|integer',
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

        $transaksi = TransaksiNasabah::create([
            'unit_id' => $unit->id,
            'nasabah_id' => $request->nasabah_id,
            'tanggal' => $request->tanggal,
            'total' => $total
        ]);

        $index = 0;
        foreach ($request->jenis_sampah_unit_id as $item) {
            $jenisSampah = JenisSampahUnit::where('id', $item)->first();
            DetailTransaksiNasabah::create([
                'transaksi_id' => $transaksi->id,
                'jenis_sampah_unit_id' => $jenisSampah->id,
                'jumlah' => $request->jumlah[$index],
                'total' => $jenisSampah->harga_beli * $request->jumlah[$index]
            ]);

            $jenisSampah->stok += $request->jumlah[$index];
            $jenisSampah->update([
                'stok' => $jenisSampah->stok
            ]);
            $index++;
        }

        $unit->saldo -+ $total;
        $unit->update([
            'saldo' => $unit->saldo
        ]);

        $nasabah = Nasabah::findOrFail($request->nasabah_id);
        $nasabah->saldo += $total;
        $nasabah->update([
            'saldo' => $nasabah->saldo
        ]);

        return $this->redirectRoute(transaksiNasabah: $transaksi);
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
        $details = DetailTransaksiNasabah::where('transaksi_id', $id)->get();
        return view('transaksiNasabah.edit', [
            'details' => $details
        ]);
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
     * @param  mixed $transaksiNasabah
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        TransaksiNasabah $transaksiNasabah,
        String $route = 'transaksiNasabah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($transaksiNasabah) {
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
