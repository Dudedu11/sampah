<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\TransaksiNasabah;
use App\Models\Unit;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanTransaksiNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session('user');
        $unit = Unit::where('user_id', $user)->first();
        $nasabahs = Nasabah::where('unit_id', $unit->id)
        ->orderBy('nama', 'asc')
        ->get();
        return view('laporanTransaksiNasabah.index', [
            'nasabahs' => $nasabahs
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
    public function store(Request $request)
    {
        if ($request->nasabah == 'semua') {
            $transaksiNasabahs = TransaksiNasabah::where('unit_id', $request->id)
                ->where('tanggal', '>=', $request->tgl_dari)
                ->where('tanggal', '<=', $request->tgl_sampai)
                ->orderBy('tanggal', 'asc')
                ->get();
        } else {
            $transaksiNasabahs = TransaksiNasabah::where('unit_id', $request->id)
                ->where('nasabah_id', $request->nasabah)
                ->where('tanggal', '>=', $request->tgl_dari)
                ->where('tanggal', '<=', $request->tgl_sampai)
                ->orderBy('tanggal', 'asc')
                ->get();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Bank Sampah Unit');
        $sheet->setCellValue('C1', 'Nasabah');
        $sheet->setCellValue('D1', 'Total');

        // Data
        $row = 2;
        foreach ($transaksiNasabahs as $transaksi) {
            $sheet->setCellValue('A' . $row, $transaksi->tanggal);
            $sheet->setCellValue('B' . $row, $transaksi->unit->nama);
            $sheet->setCellValue('C' . $row, $transaksi->nasabah->nama);
            $sheet->setCellValue('D' . $row, $transaksi->total);
            $row++;
        }

        // Save the spreadsheet
        $writer = new Xlsx($spreadsheet);
        $filename = 'transaksi_nasabah_export.xlsx';
        $writer->save($filename);

        // Download the file
        return response()->download($filename)->deleteFileAfterSend(true);
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
