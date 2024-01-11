@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Transaksi Industri</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left content goes here -->
                            </div>
                            @if(session('role') == 3)
                            <div class="col-md-6 text-end">
                                <a class="btn btn-primary" href="{{ route('transaksiIndustri.create') }}">Tambah Transaksi</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    </br>
                    <div class="table-responsive">
                        @include('induk.transaksiIndustri.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('induk.transaksiIndustri.script')

@endsection