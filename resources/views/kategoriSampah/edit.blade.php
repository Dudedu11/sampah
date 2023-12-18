@extends('layout.master')

@section('title', 'Edit Kategori Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Edit Kategori Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategoriSampah.update', ['kategoriSampah' => $kategoriSampah->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Kategori:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategoriSampah->nama }}">
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
            <a class="btn btn-secondary" href="{{ route('kategoriSampah.index') }}">Back</a>
        </div>
    </div>

</div>

@endsection
