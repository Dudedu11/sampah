<?php

namespace App\Http\Controllers\fbj;

use App\Http\Controllers\Controller;
use App\Models\RequestPendampingan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ListRequestPendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = RequestPendampingan::where('status', null)->get();
        $allRequest = RequestPendampingan::where('status', '!=', null)->get();
        return view('fbj.requestPendampingan.index', [
            'requests' => $request,
            'all' => $allRequest
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'aksi' => 'required|string',
            'id' => 'required|integer',
        ]);

        $pendampingan = RequestPendampingan::where('id', $request->id)->first();
        if($request->aksi == "terima"){
            $pendampingan->update([
                'status' => true
            ]);
        }else{
            $pendampingan->update([
                'status' => false
            ]);
        }

        return $this->redirectRoute(pendampingan: $pendampingan);
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
     * @param  mixed $pendampingan
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        RequestPendampingan $pendampingan,
        String $route = 'listRequestPendampingan.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($pendampingan) {
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
