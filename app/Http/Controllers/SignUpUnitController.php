<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpUnitStore;
use App\Models\Induk;
use App\Models\JenisSampahInduk;
use App\Models\JenisSampahUnit;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signUpUnit.index', [
            'induks' => Induk::all()
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
    public function store(SignUpUnitStore $request): RedirectResponse
    {
        $user = User::create([
            'role_id' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $unit = Unit::create([
            'user_id' => $user->id,
            'induk_id' => $request->indukId,
            'nama' => $request->nama,
            'nama_ketua' => $request->namaKetua,
            'alamat' => $request->alamat,
            'no_telepon' => $request->noTelepon,
            'nama_bank' => $request->namaBank,
            'no_rekening' => $request->noRekening
        ]);

        if ($request->indukId != null) {
            $jenisSampah = JenisSampahInduk::where('induk_id', $request->indukId)->get();
            if ($jenisSampah != null) {
                foreach ($jenisSampah as $item) {
                    JenisSampahUnit::create([
                        'unit_id' => $unit->id,
                        'nama' => $item->nama,
                        'satuan' => $item->satuan,
                        'harga_jual' => $item->harga,
                        'harga_beli' => 0,
                        'stok' => 0,
                        'deskripsi' => $item->deskripsi,
                    ]);
                }
            }
        }

        return $this->redirectRoute(user: $user, unit: $unit);
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
     * @param  mixed $user
     * @param  mixed $unit
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        User $user,
        Unit $unit,
        String $route = 'login',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($user && $unit) {
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
