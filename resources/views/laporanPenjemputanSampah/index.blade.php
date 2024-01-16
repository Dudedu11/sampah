@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Laporan Penjemputan Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="">
                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Mulai Tanggal</label>
                                    <input autocomplete="off" type="date" value="<?php

use App\Models\Induk;
use App\Models\PenjemputanSampahUnit;
use App\Models\Unit;

                                                                                    if (isset($_GET['tanggal_dari'])) {
                                                                                        echo $_GET['tanggal_dari'];
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input autocomplete="off" type="date" value="<?php if (isset($_GET['tanggal_sampai'])) {
                                                                                        echo $_GET['tanggal_sampai'];
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                                </div>
                            </div>

                            <div class="col-md-3">
                                </br>
                                <div class="form-group">
                                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
                        $tgl_dari = $_GET['tanggal_dari'];
                        $tgl_sampai = $_GET['tanggal_sampai'];

                        $user = session('user');
                        if (session('role') == 2) {
                            $unit = Unit::where('user_id', $user)->first();

                            $penjemputans = PenjemputanSampahUnit::where('unit_id', $unit->id)
                                ->where('tanggal', '>=', $tgl_dari)
                                ->where('tanggal', '<=', $tgl_sampai)
                                ->orderBy('tanggal', 'asc')
                                ->get();
                        } else {
                            $induk = Induk::where('user_id', $user)->first();
                            $penjemputans = PenjemputanSampahUnit::where('induk_id', $induk->id)
                                ->where('tanggal', '>=', $tgl_dari)
                                ->where('tanggal', '<=', $tgl_sampai)
                                ->where('status', true)
                                ->orderBy('tanggal', 'asc')
                                ->get();
                        }
              
                    
                    ?>

                        <form action="{{ route('laporanPenjemputanSampah.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="tgl_dari" value="{{ $tgl_dari }}">
                            <input type="hidden" name="tgl_sampai" value="{{ $tgl_sampai }}">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">
                                <i class="align-middle" data-feather="download"></i> Download Laporan
                            </button>
                        </form>
                        </br>

                        <div class="table-responsive">
                            @include('laporanPenjemputanSampah.table')
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection