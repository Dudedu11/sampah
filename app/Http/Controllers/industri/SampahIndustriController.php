<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use App\Models\Industri;
use App\Models\SampahIndustri;
use Illuminate\Http\Request;

class SampahIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        if (session('role') == 4) {
            $industri = Industri::where('user_id', $user)->first();
            $sampahIndustris = SampahIndustri::where('industri_id', $industri->id)->get();
            return view('industri.sampahIndustri.index', [
                'sampahIndustris' => $sampahIndustris
            ]);
        }else{
            $sampahIndustris = SampahIndustri::all();
            return view('induk.sampahIndustri.index', [
                'sampahIndustris' => $sampahIndustris
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industri.sampahIndustri.create');
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
            'nama' => 'required|string',
            'satuan' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        $user = session('user');
        $industri = Industri::where('user_id', $user)->first();

        $sampahIndustri = SampahIndustri::create([
            'industri_id' => $industri->id,
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('sampahIndustri.index');
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
        $sampahIndustri = SampahIndustri::find($id);

        if (!$sampahIndustri) {
            return redirect()->route('sampahIndustri.destroy')->with('error', 'Data tidak ditemukan.');
        }

        $sampahIndustri->delete();

        return redirect()->route('sampahIndustri.index')->with('success', 'Data berhasil dihapus.');
    }
}
