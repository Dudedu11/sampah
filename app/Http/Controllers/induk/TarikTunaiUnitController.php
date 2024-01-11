<?php

namespace App\Http\Controllers\induk;

use App\Http\Controllers\Controller;
use App\Models\Induk;
use App\Models\TarikTunaiUnit;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TarikTunaiUnitController extends Controller
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
        $tarikTunai = TarikTunaiUnit::where('induk_id', $induk->id)->get();
        return view('induk.tarikTunaiUnit.index',[
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
        $induk = Induk::where('user_id', $user)->first();
        $units = Unit::where('induk_id', $induk->id)
        ->orderBy('nama', 'asc')
        ->get();

        return view('induk.tarikTunaiUnit.create',[
            'units' => $units
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
            'unit_id' => 'required|integer',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();

        $tarikTunaiUnit = TarikTunaiUnit::create([
            'induk_id' => $induk->id,
            'unit_id' => $request->unit_id,
            'tanggal' => $request->tanggal,
            'total' => $request->jumlah
        ]);

        $unit = Unit::findOrFail($request->unit_id);
        $unit->saldo -= $request->jumlah;
        $unit->update([
            'saldo' => $unit->saldo
        ]);

        return $this->redirectRoute(tarikTunaiUnit: $tarikTunaiUnit);
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
     * @param  mixed $tarikTunaiUnit
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        TarikTunaiUnit $tarikTunaiUnit,
        String $route = 'tarikTunaiUnit.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($tarikTunaiUnit) {
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
