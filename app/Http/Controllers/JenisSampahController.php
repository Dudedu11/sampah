<?php

namespace App\Http\Controllers;

use App\Models\JenisSampahInduk;
use App\Models\KategoriSampah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisSampah = JenisSampahInduk::all(); // Fix: Use JenisSampahInduk model
        return view('jenisSampah.index', [
            'jenisSampahs' => $jenisSampah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriSampah = KategoriSampah::all();
        return view('jenisSampah.create', [
            'kategoriSampahs' => $kategoriSampah
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
    // Validasi request jika diperlukan
    $request->validate([
        'kategori_id' => 'required|integer',
        'nama' => 'required|string',
        'satuan' => 'required|string',
        'harga_beli' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'deskripsi' => 'required|string',
    ]);

    // Cek apakah kategori dengan ID yang diberikan ada
    $kategori = KategoriSampah::find($request->input('kategori_id'));

    if (!$kategori) {
        return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
    }

    // Simpan data ke JenisSampahInduk
    $jenisSampah = JenisSampahInduk::create([
        'kategori_id' => $kategori->id,
        'nama' => $request->nama,
        'satuan' => $request->satuan,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'stok' => 0,
        'deskripsi' => $request->deskripsi,
    ]);

    return $this->redirectRoute(jenisSampah: $jenisSampah);
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
        $jenisSampah = JenisSampahInduk::find($id);
        $kategoriSampahs = KategoriSampah::all(); // Sesuaikan dengan model dan data yang benar
    
        return view('jenisSampah.edit', compact('jenisSampah', 'kategoriSampahs'));
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
        $jenisSampah = JenisSampahInduk::find($id);
    
        $jenisSampah->update([
            'nama' => $request->input('nama'),
            'satuan' => $request->input('satuan'),
            'harga_beli' => $request->input('harga_beli'),
            'harga_jual' => $request->input('harga_jual'),
            'deskripsi' => $request->input('deskripsi'),
        ]);
    
        return redirect()->route('jenisSampah.index')->with('success', 'Data berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisSampah = JenisSampahInduk::find($id);
    
        if (!$jenisSampah) {
            return redirect()->route('jenisSampah.destroy')->with('error', 'Data tidak ditemukan.');
        }
    
        $jenisSampah->delete();
    
        return redirect()->route('jenisSampah.index')->with('success', 'Data berhasil dihapus.');
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
        JenisSampahInduk $jenisSampah, // Update the type hint to JenisSampahInduk
        string $route = 'jenisSampah.index',
        string $successMsg = 'Berhasil',
        string $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($jenisSampah) {
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
