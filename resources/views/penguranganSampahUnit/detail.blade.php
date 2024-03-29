@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Detail Transaksi Nasabah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                <td>Rp. {{ number_format($detail->jenisSampahUnit->harga_jual) }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp. {{ number_format($detail->jenisSampahUnit->harga_jual * $detail->jumlah) }}</td>
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