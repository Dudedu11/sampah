<?php

namespace App\Http\Controllers;

use App\Models\Induk;
use App\Models\Industri;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        $profile = null;
        if(session('role') == 2){
            $profile = Unit::where('user_id', $user)->first();
        }elseif(session('role') == 3){
            $profile = Induk::where('user_id', $user)->first();
        }elseif(session('role') == 4){
            $profile = Industri::where('user_id', $user)->first();
        }

        return view('profile.index',[
            'profile' => $profile 
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
    public function store(Request $request)
    {
        //
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

        if(session('role') == 2){
            $user = Unit::where('id', $id)->first();
            $user->update([
                'nama' => $request->nama,
                'nama_ketua' => $request->namaKetua,
                'alamat' => $request->alamat,
                'no_telepon' => $request->noTelepon,
                'nama_bank' => $request->namaBank,
                'no_rekening' => $request->noRekening,
                'saldo' => $request->saldo
            ]);
        }elseif(session('role') == 3){
            $user = Induk::where('id', $id)->first();
            $user->update([
                'nama' => $request->nama,
                'nama_ketua' => $request->namaKetua,
                'alamat' => $request->alamat,
                'no_telepon' => $request->noTelepon,
                'nama_bank' => $request->namaBank,
                'no_rekening' => $request->noRekening,
                'saldo' => $request->saldo
            ]);
        }elseif(session('role') == 4){
            $user = Industri::where('id', $id)->first();
            $user->update([
                'nama' => $request->nama,
                'nama_ketua' => $request->namaKetua,
                'alamat' => $request->alamat,
                'no_telepon' => $request->noTelepon
            ]);
        }

        return redirect()->back();
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
}
