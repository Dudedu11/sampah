@extends('layout.master')

@section('title', 'Edit Jenis Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Edit Jenis Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('jenisSampahInduk.update', $jenisSampah->id) }}" method="POST" id="pembelianForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kategori_id">Kategori Sampah:</label>
                            <select class="form-control" id="kategori_id" name="kategori_id">
                                @foreach($kategoriSampahs as $kategoriSampah)
                                <option value="{{ $kategoriSampah->id }}" {{ $jenisSampah->kategori_id ==
                                    $kategoriSampah->id ? 'selected' : '' }}>
                                    {{ $kategoriSampah->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Jenis Sampah:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $jenisSampah->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="satuan">Satuan:</label>
                            <input type="text" class="form-control" id="satuan" name="satuan"
                                value="{{ $jenisSampah->satuan }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga:</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ isset($jenisSampah->harga) ? $jenisSampah->harga : 0 }}">
                        </div>


                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi"
                                name="deskripsi">{{ $jenisSampah->deskripsi }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-secondary" href="{{ route('jenisSampahInduk.index') }}">Back</a>
        </div>
    </div>

</div>

@endsection