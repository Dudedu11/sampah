<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\TransaksiIndustri;
use App\Models\TransaksiNasabah;
use App\Models\Unit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('role') == 1) {
            $transaksi = TransaksiIndustri::all();
            $saldo = 0;
            foreach ($transaksi as $item) {
                $saldo += $item->total * 15 / 100;
            }
            return view('dashboard.index', [
                'saldo' => $saldo
            ]);
        }else{
            $transaksiModel = new TransaksiNasabah();
            $user = session('user');
            $unit = Unit::where('user_id', $user)->first();
            $nasabah = Nasabah::where('unit_id', $unit->id)->count();

            $year = 2024; 
            $months = range(1, 12);
    
            $totalData = [];
    
            foreach ($months as $month) {
                $totalDatas = $transaksiModel->getTotalTransakasiNasabah($year, $month, $unit->id);
                $totalData[] = $totalDatas;
            }

            return view('dashboard.index', [
                'nasabah' => $nasabah,
                'totalDataPemasukan' => $totalData
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
