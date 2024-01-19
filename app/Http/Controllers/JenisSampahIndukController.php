<?php

namespace App\Http\Controllers;

use App\Models\Induk;
use App\Models\JenisSampahInduk;
use App\Models\JenisSampahUnit;
use App\Models\KategoriSampah;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JenisSampahIndukController extends Controller
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
        $jenisSampah = JenisSampahInduk::where('induk_id', $induk->id)->get();
        return view('jenisSampahInduk.index', [
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
        return view('jenisSampahInduk.create', [
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
        $request->validate([
            'kategori_id' => 'required|integer',
            'nama' => 'required|string',
            'satuan' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $kategori = KategoriSampah::find($request->kategori_id);

        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();

        $jenisSampahInduk = JenisSampahInduk::create([
            'kategori_id' => $kategori->id,
            'induk_id' => $induk->id,
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);


      
        $units = Unit::where('induk_id', $induk->id)->get();
      
        foreach ($units as $unit) {
            JenisSampahUnit::create([
                'unit_id' => $unit->id,
                'nama' => $request->nama,
                'satuan' => $request->satuan,
                'harga_jual' => $request->harga,
                'harga_beli' => 0,
                'stok' => 0,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return $this->redirectRoute(jenisSampahInduk: $jenisSampahInduk);
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

        return view('jenisSampahInduk.edit', compact('jenisSampah', 'kategoriSampahs'));
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

        return redirect()->route('jenisSampahInduk.index')->with('success', 'Data berhasil diperbarui.');
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
            return redirect()->route('jenisSampahInduk.destroy')->with('error', 'Data tidak ditemukan.');
        }

        $jenisSampah->delete();

        return redirect()->route('jenisSampahInduk.index')->with('success', 'Data berhasil dihapus.');
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
        JenisSampahInduk $jenisSampahInduk, // Update the type hint to JenisSampahInduk
        string $route = 'jenisSampahInduk.index',
        string $successMsg = 'Berhasil',
        string $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($jenisSampahInduk) {
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
