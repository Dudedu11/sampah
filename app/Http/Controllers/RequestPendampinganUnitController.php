<?php

namespace App\Http\Controllers;

use App\Models\Induk;
use App\Models\RequestPendampingan;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RequestPendampinganUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        if (session('role') == 2) {
            $unit = Unit::where('user_id', $user)->first();
            $request = RequestPendampingan::where('nama', $unit->nama)->get();
        } else {
            $induk = Induk::where('user_id', $user)->first();
            $request = RequestPendampingan::where('nama', $induk->nama)->get();
        }
        return view('requestPendampinganUnit.index', [
            'requests' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requestPendampinganUnit.create');
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
        ]);

        $user = session('user');
        if (session('role') == 2) {
            $unit = Unit::where('user_id', $user)->first();
            $jenis = "Bank Sampah Unit";
            $nama = $unit->nama;
            $alamat = $unit->alamat;
        }else{
            $induk = Induk::where('user_id', $user)->first();
            $jenis = "Bank Sampah Induk";
            $nama = $induk->nama;
            $alamat = $induk->alamat;
        }
        $requestPendampingan = RequestPendampingan::create([
            'tanggal' => $request->tanggal,
            'jenis' => $jenis,
            'nama' => $nama,
            'alamat' => $alamat,
            'keterangan' => $request->keterangan
        ]);

        return $this->redirectRoute(requestPendampingan: $requestPendampingan);
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
     * @param  mixed $requestPendampingan
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        RequestPendampingan $requestPendampingan,
        String $route = 'requestPendampinganUnit.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($requestPendampingan) {
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
