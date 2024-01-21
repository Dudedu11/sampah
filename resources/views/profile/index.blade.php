@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Profile</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('profile.update', $users->id) }}" method="POST" id="pembelianForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $users->nama}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ketua</label>
                            <input type="text" class="form-control" id="namaKetua" name="namaKetua" value="{{ $users->nama_ketua}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $users->alamat}}" rows="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelepon" name="noTelepon" value="{{ $users->no_telepon}}" required>
                        </div>
                        @if(session('role') != 4)
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="namaBank" value="{{ $users->nama_bank}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="noRekening" name="noRekening" value="{{ $users->no_rekening}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Saldo</label>
                            <input type="number" class="form-control" id="saldo" name="saldo" value="{{ $users->saldo}}" required>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection