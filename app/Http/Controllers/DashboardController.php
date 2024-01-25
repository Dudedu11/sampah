<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiNasabah;
use App\Models\Induk;
use App\Models\Industri;
use App\Models\Nasabah;
use App\Models\PenguranganSampahUnit;
use App\Models\PenjemputanSampahUnit;
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
            $transaksiIndustri = new TransaksiIndustri();
            $transaksiNasabah = new TransaksiNasabah();
            $penjemputanSampahUnit = new PenjemputanSampahUnit();
            $totalTransaksi = DetailTransaksiNasabah::sum('jumlah');
            $taun = date('Y');
            $jan = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 1)
            ->sum('jumlah');
            $feb = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 2)
            ->sum('jumlah');
            $mar = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 3)
            ->sum('jumlah');
            $apr = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 4)
            ->sum('jumlah');
            $mei = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 5)
            ->sum('jumlah');
            $jun = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 6)
            ->sum('jumlah');
            $jul = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 7)
            ->sum('jumlah');
            $agu = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 8)
            ->sum('jumlah');
            $sep = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 9)
            ->sum('jumlah');
            $okt = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 10)
            ->sum('jumlah');
            $nov = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 11)
            ->sum('jumlah');
            $des = DetailTransaksiNasabah::whereYear('created_at', $taun)
            ->whereMonth('created_at', 12)
            ->sum('jumlah');
            $saldo = 0;
            $nasabah = Nasabah::count();
            $unit = Unit::whereHas('user', function ($query) {
                $query->where('is_active', true);
            })->count();
            $induk = Induk::whereHas('user', function ($query) {
                $query->where('is_active', true);
            })->count();
            $industri = Industri::whereHas('user', function ($query) {
                $query->where('is_active', true);
            })->count();


            $year = 2024;
            $months = range(1, 12);

            foreach ($transaksi as $item) {
                $saldo += $item->total * 15 / 100;
            }

            $totalTransaksiNasabah = [];
            foreach ($months as $month) {
                $totalTransaksis = $transaksiNasabah->getTotalTransakasiNasabah($year, $month);
                $totalTransaksiNasabah[] = $totalTransaksis;
            }

            $totalTransaksiUnit = [];
            foreach ($months as $month) {
                $totalTransaksiUnits = $penjemputanSampahUnit->getTotalTransakasiUnit($year, $month);
                $totalTransaksiUnit[] = $totalTransaksiUnits;
            }

            $totalTransaksiInduk = [];
            foreach ($months as $month) {
                $totalTransaksiInduks = $transaksiIndustri->getTotalTransakasiInduk($year, $month);
                $totalTransaksiInduk[] = $totalTransaksiInduks;
            }

            return view('dashboard.index', [
                'saldo' => $saldo,
                'nasabah' => $nasabah,
                'unit' => $unit,
                'induk' => $induk,
                'industri' => $industri,
                'transaksiNasabah' => $totalTransaksiNasabah,
                'transaksiUnit' => $totalTransaksiUnit,
                'transaksiInduk' => $totalTransaksiInduk,
                'totalTransaksi' => $totalTransaksi,
                'jan' => $jan,
                'feb' => $feb,
                'mar' => $mar,
                'apr' => $apr,
                'mei' => $mei,
                'jun' => $jun,
                'jul' => $jul,
                'agu' => $agu,
                'sep' => $sep,
                'okt' => $okt,
                'nov' => $nov,
                'des' => $des
            ]);
        } elseif (session('role') == 2) {
            $transaksiModel = new PenguranganSampahUnit();
            $pengeluaran = new TransaksiNasabah();
            $penjemputanSampahUnit = new PenjemputanSampahUnit();
            $user = session('user');
            $unit = Unit::where('user_id', $user)->first();
            $nasabah = Nasabah::where('unit_id', $unit->id)->count();

            $year = 2024;
            $months = range(1, 12);

            $totalData = [];

            if ($unit->induk_id == null) {
                foreach ($months as $month) {
                    $totalDatas = $transaksiModel->getTotalPengurangan($year, $month, $unit->id);
                    $totalData[] = $totalDatas;
                }
            } else {
                foreach ($months as $month) {
                    $totalDatas = $penjemputanSampahUnit->getTotalPemasukanUnit($year, $month, $unit->id);
                    $totalData[] = $totalDatas;
                }
            }

            $totalPengeluaran = [];
            foreach ($months as $month) {
                $totalPengeluuarans = $pengeluaran->getTotalTransakasiNasabah($year, $month, $unit->id);
                $totalPengeluaran[] = $totalPengeluuarans;
            }

            return view('dashboard.index', [
                'user' => $nasabah,
                'totalPemasukan' => $totalData,
                'totalPengeluaran' => $totalPengeluaran
            ]);
        } elseif (session('role') == 3) {
            $penjemputanSampahUnit = new PenjemputanSampahUnit();
            $transaksiIndustri = new TransaksiIndustri();
            $user = session('user');
            $induk = Induk::where('user_id', $user)->first();
            $unit = Unit::where('induk_id', $induk->id)->count();

            $year = 2024;
            $months = range(1, 12);

            $totalPemasukan = [];

            foreach ($months as $month) {
                $totalDatas = $transaksiIndustri->getTotalPemasukanInduk($year, $month, $induk->id);
                $totalPemasukan[] = $totalDatas;
            }

            $totalPengeluaran = [];
            foreach ($months as $month) {
                $totalPengeluarans = $penjemputanSampahUnit->getTotalPengeluaranInduk($year, $month, $induk->id);
                $totalPengeluaran[] = $totalPengeluarans;
            }

            return view('dashboard.index', [
                'user' => $unit,
                'totalPengeluaran' => $totalPengeluaran,
                'totalPemasukan' => $totalPemasukan
            ]);
        } else {
            $transaksiIndustri = new TransaksiIndustri();
            $user = session('user');
            $industri = Industri::where('user_id', $user)->first();
            $induk = Induk::count();

            $year = 2024;
            $months = range(1, 12);

            $totalPengeluaran = [];

            foreach ($months as $month) {
                $totalDatas = $transaksiIndustri->getTotalPemasukanInduk($year, $month, $industri->id);
                $totalPengeluaran[] = $totalDatas;
            }

            return view('dashboard.index', [
                'user' => $induk,
                'totalPengeluaran' => $totalPengeluaran
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
