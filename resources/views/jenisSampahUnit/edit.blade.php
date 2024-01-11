@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenisSampahUnit.update', $jenisSampah->id) }}" method="POST" id="pembelianForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nik" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="harga_beli" id="harga_beli" value="{{$jenisSampah->harga_beli}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection