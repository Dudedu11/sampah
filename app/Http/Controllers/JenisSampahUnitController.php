<?php

namespace App\Http\Controllers;

use App\Models\JenisSampahUnit;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JenisSampahUnitController extends Controller
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
        $jenisSampah = JenisSampahUnit::where('unit_id', $unit->id)->get();
        return view('jenisSampahUnit.index', ['jenisSampahs' => $jenisSampah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenisSampahUnit.create');
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
            'nama' => 'required|string',
            'satuan' => 'required|string',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();

        $jenisSampah = JenisSampahUnit::create([
            'unit_id' => $unit->id,
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => 0,
            'deskripsi' => $request->deskripsi
        ]);

        return $this->redirectRoute(jenisSampahUnit: $jenisSampah);
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
        $jenisSampah = JenisSampahUnit::where('id', $id)->first();
        return view('jenisSampahUnit.edit',[
            'jenisSampah' => $jenisSampah
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
        $jenisSampah = JenisSampahUnit::findOrFail($id);
        $jenisSampah->update([
            'harga_beli' => $request->harga_beli
        ]);

        return redirect()->intended('/jenisSampahUnit');
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
     * @param  mixed $jenisSampah
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        JenisSampahUnit $jenisSampahUnit, // Update the type hint to JenisSampahInduk
        string $route = 'jenisSampahUnit.index',
        string $successMsg = 'Berhasil',
        string $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($jenisSampahUnit) {
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
