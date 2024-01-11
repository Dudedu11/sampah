@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Detail Request Penjemputan Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        @if($penjemputan->status == null)
                        <div class="row">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-1">
                                <form action="{{ route('penjemputanSampah.store') }}" method="POST" id="pembelianFormTerima">
                                    @csrf
                                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="terima">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}">
                                    <button type="submit" class="btn btn-primary">Terima</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <form action="{{ route('penjemputanSampah.store') }}" method="POST" id="pembelianFormTolak">
                                    @csrf
                                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="tolak">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}">
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    </br>
                    <table class="table table-bordered" id="example" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Nama Sampah</th>
                                <th style="text-align:center;">Harga</th>
                                <th style="text-align:center;">Jumlah</th>
                                <th style="text-align:center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->jenisSampahUnit->nama }}</td>
                                <td>Rp. {{ number_format($detail->jenisSampahUnit->harga_beli) }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp. {{ number_format($detail->jenisSampahUnit->harga_beli * $detail->jumlah) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection