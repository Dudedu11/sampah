<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\TarikTunaiNasabah;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TarikTunaiController extends Controller
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
        $tarikTunai = TarikTunaiNasabah::where('unit_id', $unit->id)->get();
        return view('tarikTunaiNasabah.index',[
            'tarikTunais' => $tarikTunai
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

        return view('tarikTunaiNasabah.create',[
            'nasabahs' => $nasabahs
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
            'nasabah_id' => 'required|integer',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();

        $tarikTunaiNasabah = TarikTunaiNasabah::create([
            'unit_id' => $unit->id,
            'nasabah_id' => $request->nasabah_id,
            'tanggal' => $request->tanggal,
            'total' => $request->jumlah
        ]);

        $nasabah = Nasabah::findOrFail($request->nasabah_id);
        $nasabah->saldo -= $request->jumlah;
        $nasabah->update([
            'saldo' => $nasabah->saldo
        ]);

        return $this->redirectRoute(tarikTunaiNasabah: $tarikTunaiNasabah);
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
     * @param  mixed $tarikTunaiNasabah
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        TarikTunaiNasabah $tarikTunaiNasabah,
        String $route = 'tarikTunaiNasabah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($tarikTunaiNasabah) {
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
