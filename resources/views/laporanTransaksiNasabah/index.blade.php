@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Kategori Sampah</h1>

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

                                                                                    use App\Models\TransaksiNasabah;
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

                                <div class="form-group">
                                    <label>Nasabah</label>
                                    <select value="" name="nasabah" class="form-control">
                                        <option value="semua">- Semua -</option>
                                        @foreach($nasabahs as $nasabah)
                                        <option value="{{ $nasabah->id }}">{{ $nasabah->nama }}</option>
                                        @endforeach
                                    </select>
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
                    if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['nasabah'])) {
                        $tgl_dari = $_GET['tanggal_dari'];
                        $tgl_sampai = $_GET['tanggal_sampai'];
                        $nasabah = $_GET['nasabah'];

                        $user = session('user');
                        $unit = Unit::where('user_id', $user)->first();

                        if ($nasabah == 'semua') {
                            $transaksis = TransaksiNasabah::where('unit_id', $unit->id)
                                ->where('tanggal', '>=', $tgl_dari)
                                ->where('tanggal', '<=', $tgl_sampai)
                                ->orderBy('tanggal', 'asc')
                                ->get();
                        } else {
                            $transaksis = TransaksiNasabah::where('unit_id', $unit->id)
                                ->where('nasabah_id', $nasabah)
                                ->where('tanggal', '>=', $tgl_dari)
                                ->where('tanggal', '<=', $tgl_sampai)
                                ->orderBy('tanggal', 'asc')
                                ->get();
                        }
                    ?>

                        <form action="{{ route('laporanTransaksiNasabah.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id}}">
                            <input type="hidden" name="tgl_dari" value="{{ $tgl_dari }}">
                            <input type="hidden" name="tgl_sampai" value="{{ $tgl_sampai }}">
                            <input type="hidden" name="nasabah" value="{{ $nasabah }}">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">
                                <i class="align-middle" data-feather="download"></i> Download Laporan
                            </button>
                        </form>
                        </br>

                        <div class="table-responsive">
                            @include('laporanTransaksiNasabah.table')
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