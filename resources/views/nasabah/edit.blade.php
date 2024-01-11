@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Nasabah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST" id="pembelianForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" value="{{$nasabah->nik}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$nasabah->nama}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" value="{{$nasabah->alamat}}" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelepon" name="noTelepon" value="{{$nasabah->no_telepon}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="noRekening" name="noRekening" value="{{$nasabah->no_rekening}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Saldo</label>
                            <input type="number" class="form-control" id="saldo" name="saldo" value="{{$nasabah->saldo}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection