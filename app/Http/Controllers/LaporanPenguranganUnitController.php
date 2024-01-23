<?php

namespace App\Http\Controllers;

use App\Models\PenguranganSampahUnit;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanPenguranganUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporanPenguranganUnit.index');
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
        $pengurangans = PenguranganSampahUnit::where('unit_id', $request->id)
        ->where('tanggal', '>=', $request->tgl_dari)
        ->where('tanggal', '<=', $request->tgl_sampai)
        ->orderBy('tanggal', 'asc')
        ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Bank Sampah Unit');
        $sheet->setCellValue('C1', 'Keterangan');
        $sheet->setCellValue('D1', 'Total');

        // Data
        $row = 2;
        foreach ($pengurangans as $transaksi) {
            $sheet->setCellValue('A' . $row, $transaksi->tanggal);
            $sheet->setCellValue('B' . $row, $transaksi->unit->nama);
            $sheet->setCellValue('C' . $row, $transaksi->keterangan);
            $sheet->setCellValue('D' . $row, $transaksi->total);
            $row++;
        }

        // Save the spreadsheet
        $writer = new Xlsx($spreadsheet);
        $filename = 'pengurangan_sampah_unit_export.xlsx';
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
