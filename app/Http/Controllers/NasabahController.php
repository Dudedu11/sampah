<?php

namespace App\Http\Controllers;

use App\Http\Requests\NasabahStore;
use App\Models\Nasabah;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NasabahController extends Controller
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
        $nasabah = Nasabah::where('unit_id', $unit->id)->get();
        return view('nasabah.index', ['nasabahs' => $nasabah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NasabahStore $request): RedirectResponse
    {
        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();
        $nasabah = Nasabah::create([
            'unit_id' => $unit->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->noTelepon,
            'no_rekening' => $request->noRekening
        ]);

        return $this->redirectRoute(nasabah: $nasabah);
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
        $nasabah = Nasabah::where('id', $id)->first();
        return view('nasabah.edit',[
            'nasabah' => $nasabah
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
        $nasabah = Nasabah::findOrFail($id);

        $nasabah->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->noTelepon,
            'no_rekening' => $request->noRekening,
            'saldo' => $request->saldo
        ]);

        return $this->redirectRoute(nasabah: $nasabah);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->delete();

        return $this->redirectRoute(nasabah: $nasabah);
    }


    /**
     * Redirect route based on condition.
     *
     * @param  mixed $user
     * @param  mixed $induk
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        Nasabah $nasabah,
        String $route = 'nasabah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($nasabah) {
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
