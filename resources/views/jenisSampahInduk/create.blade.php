@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Tambah Jenis Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenisSampahInduk.store') }}" method="POST" id="jenisSampahForm">
                        @csrf
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori Sampah</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">Pilih Kategori Sampah</option>
                                @foreach ($kategoriSampahs as $kategoriSampah)
                                    <option value="{{ $kategoriSampah->id }}">{{ $kategoriSampah->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga " required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
