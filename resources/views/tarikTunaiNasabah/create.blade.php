@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Data Transaksi Nasabah</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tarikTunaiNasabah.store') }}" method="POST" id="pembelianForm">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="nasabah_id" class="form-label">Nasabah</label>
                            <select class="form-control" id="nasabah_id" name="nasabah_id" required>
                                <option value="">Pilih Nasabah</option>
                                @foreach ($nasabahs as $nasabah)
                                <option value="{{ $nasabah->id }}">{{ $nasabah->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection