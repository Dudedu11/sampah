@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Data Konversi Sampah</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('konversiSampah.store') }}" method="POST" id="pembelianForm">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="sampah_id" class="form-label">Jenis Sampah</label>
                            <select class="form-control" id="sampah_id" name="sampah_id" required>
                                <option value="">Pilih Jenis Sampah</option>
                                @foreach ($jenisSampahs as $jenisSampah)
                                <option value="{{ $jenisSampah->id }}">{{ $jenisSampah->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_sampah" class="form-label">Jumlah Sampah</label>
                            <input type="number" class="form-control" name="jumlah_sampah" id="jumlah_sampah" required>
                        </div>
                        <div class="mb-3">
                            <label for="treatment_id" class="form-label">Sampah Treatment</label>
                            <select class="form-control" id="treatment_id" name="treatment_id" required>
                                <option value="">Pilih Sampah Treatment</option>
                                @foreach ($sampahTreatments as $sampahTreatment)
                                <option value="{{ $sampahTreatment->id }}">{{ $sampahTreatment->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_treatment" class="form-label">Jumlah Treatment</label>
                            <input type="number" class="form-control" name="jumlah_treatment" id="jumlah_treatment" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection