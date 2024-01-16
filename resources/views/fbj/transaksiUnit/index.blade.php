@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Transaksi Bank Sampah Unit</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </br>
                    <div class="table-responsive">
                        @include('fbj.transaksiUnit.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('fbj.transaksiUnit.script')

@endsection