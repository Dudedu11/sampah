<?php

namespace App\Http\Controllers\fbj;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi =  Informasi::all();
        return view('fbj.informasi.index',  [
            'informasis' => $informasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fbj.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Simpan file di storage atau folder yang diinginkan
        $fotoPath = $request->file('foto')->store('public/foto');
    
        // Dapatkan hanya nama file dari path
        $namaFile = basename($fotoPath);
    
        // Simpan data ke dalam database dengan nama file saja
        $informasi = Informasi::create([
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $namaFile,
        ]);
    
        // Redirect atau melakukan hal lain setelah penyimpanan
        return redirect()->route('informasi.index')->with('success', 'Jenis Sampah berhasil ditambahkan.');
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
}
