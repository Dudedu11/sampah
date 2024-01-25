@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Nasabah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('nasabah.store') }}" method="POST" id="pembelianForm">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelepon" name="noTelepon" placeholder="Masukkan No Telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="noRekening" name="noRekening" placeholder="Masukkan No Rekening" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="namaBank" name="namaBank" placeholder="Masukkan Nama Bank" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection