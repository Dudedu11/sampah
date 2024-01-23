<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjemputanSampahUnit;
use App\Models\JenisSampahUnit;
use App\Models\PenjemputanSampahUnit;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenjemputanSampahUnitController extends Controller
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
        $penjemputan = PenjemputanSampahUnit::where('unit_id', $unit->id)->get();
        return view('penjemputanSampahUnit.index', [
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
        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();
        $jenisSampahs = JenisSampahUnit::where('unit_id', $unit->id)
            ->orderBy('nama', 'asc')
            ->get();
        return view('penjemputanSampahUnit.create', [
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
            'jenis_sampah_unit_id.*' => 'required|integer',
            'jumlah.*' => 'required|integer',
        ]);

        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();

        $total = 0;
        $index = 0;
        foreach ($request->jenis_sampah_unit_id as $item) {
            $jenisSampah = JenisSampahUnit::where('id', $item)->first();
            $total += $jenisSampah->harga_jual * $request->jumlah[$index];
            $index++;
        }

        $penjemputan = PenjemputanSampahUnit::create([
            'unit_id' => $unit->id,
            'induk_id' => $unit->induk_id,
            'total' => $total
        ]);

        $index = 0;
        foreach ($request->jenis_sampah_unit_id as $item) {
            $jenisSampah = JenisSampahUnit::where('id', $item)->first();
            DetailPenjemputanSampahUnit::create([
                'penjemputan_id' => $penjemputan->id,
                'jenis_sampah_unit_id' => $jenisSampah->id,
                'jumlah' => $request->jumlah[$index],
                'total' => $jenisSampah->harga_jual * $request->jumlah[$index]
            ]);

            $index++;
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
        $details = DetailPenjemputanSampahUnit::where('penjemputan_id', $id)->get();
        return view('penjemputanSampahUnit.detail', [
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
        String $route = 'penjemputanSampahUnit.index',
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
