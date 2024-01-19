<?php

namespace App\Http\Controllers\induk;

use App\Http\Controllers\Controller;
use App\Models\Induk;
use App\Models\SampahTreatment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SampahTreatmentController extends Controller
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
        $sampahTreatment = SampahTreatment::where('induk_id', $induk->id)->get();
        return view('induk.sampahTreatment.index', [
            'sampahTreatments' => $sampahTreatment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('induk.sampahTreatment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string',
            'satuan' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $user = session('user');
        $induk = Induk::where('user_id', $user)->first();

        $sampahTreatment = SampahTreatment::create([
            'induk_id' => $induk->id,
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return $this->redirectRoute(sampahTreatment: $sampahTreatment);
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
        $sampahTreatment = SampahTreatment::find($id);

        return view('induk.sampahTreatment.edit', [
            'sampahTreatment' => $sampahTreatment
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
        $sampahTreatment = SampahTreatment::findOrFail($id);

        $sampahTreatment->update([
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return $this->redirectRoute(sampahTreatment: $sampahTreatment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sampahTreatment = SampahTreatment::find($id);

        if (!$sampahTreatment) {
            return redirect()->route('sampahTreatment.destroy')->with('error', 'Data tidak ditemukan.');
        }

        $sampahTreatment->delete();

        return redirect()->route('sampahTreatment.index')->with('success', 'Data berhasil dihapus.');
    }


      /**
     * Redirect route based on condition.
     *
     * @param  mixed $sampahTreatment
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        SampahTreatment $sampahTreatment, 
        string $route = 'sampahTreatment.index',
        string $successMsg = 'Berhasil',
        string $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($sampahTreatment) {
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
