@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Informasi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left content goes here -->
                            </div>
                            <div class="col-md-6 text-end">
                                <a class="btn btn-primary" href="{{ route('informasi.create') }}">Edit Informasi</a>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="table-responsive">
                        @include('fbj.informasi.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection