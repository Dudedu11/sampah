@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Jenis Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left content goes here -->
                            </div>
                            @if($users->induk_id == null)
                            <div class="col-md-6 text-end">
                                <a class="btn btn-primary" href="{{ route('jenisSampahUnit.create') }}">Tambah Jenis Sampah</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    </br>
                    <div class="table-responsive">
                        @include('jenisSampahUnit.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('jenisSampahUnit.script')

@endsection