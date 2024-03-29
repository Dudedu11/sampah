@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Request Pendampingan</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </br>
                    <div class="table-responsive">
                        @include('fbj.requestPendampingan.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </br>
                    <div class="table-responsive">
                        @include('fbj.requestPendampingan.table2')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('fbj.requestPendampingan.script')

@endsection