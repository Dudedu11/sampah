@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Request Penjemputan Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left content goes here -->
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="table-responsive">
                     @include('induk.penjemputanSampah.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('induk.penjemputanSampah.script')

@endsection