<?php

namespace App\Http\Controllers;

use App\Models\Induk;
use App\Models\KategoriSampah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
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
        $kategoriSampah = KategoriSampah::where('induk_id', $induk->id)->get();
        return view('kategoriSampah.index', ['kategoriSampahs' => $kategoriSampah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriSampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();
        $kategoriSampah = KategoriSampah::create([
            'induk_id' => $induk->id,
            'nama' => $request->nama,
        ]);

        return $this->redirectRoute(kategoriSampah: $kategoriSampah);
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
        $kategoriSampah = KategoriSampah::findOrFail($id);
        return view('kategoriSampah.edit', compact('kategoriSampah'));
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
        $kategoriSampah = KategoriSampah::findOrFail($id);
        
        // Validasi formulir jika diperlukan
    
        $kategoriSampah->update($request->all());
    
        return redirect()->route('kategoriSampah.index')->with('success', 'Kategori Sampah berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriSampah = KategoriSampah::findOrFail($id);
        $kategoriSampah->delete();
    
        return redirect()->route('kategoriSampah.index')->with('success', 'Kategori Sampah berhasil dihapus');
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
        KategoriSampah $kategoriSampah,
        String $route = 'kategoriSampah.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($kategoriSampah) {
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
