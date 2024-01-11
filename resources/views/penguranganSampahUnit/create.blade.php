@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Data Pengurangan Sampah</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('penguranganSampahUnit.store') }}" method="POST" id="pembelianForm">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" required>
                        </div>
                        <div id="dynamicFields">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="jenis_sampah_unit_id" class="form-label">Sampah</label>
                                        <select class="form-control" name="jenis_sampah_unit_id[]" required>
                                            <option value="">Pilih Sampah</option>
                                            @foreach ($jenisSampahs as $jenisSampah)
                                            <option value="{{ $jenisSampah->id }}">{{ $jenisSampah->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah[]" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-success" id="addMore">Add More</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#addMore").click(function() {
            var newRow =
                '<div class="row">' +
                '<div class="col">' +
                '<div class="mb-3">' +
                '<label for="jenis_sampah_unit_id" class="form-label">Sampah</label>' +
                '<select class="form-control" name="jenis_sampah_unit_id[]" required>' +
                '<option value="">Pilih Sampah</option>' +
                '@foreach ($jenisSampahs as $jenisSampah)' +
                '<option value="{{ $jenisSampah->id }}">{{ $jenisSampah->nama }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="mb-3">' +
                '<label for="jumlah" class="form-label">Jumlah</label>' +
                '<input type="number" class="form-control" name="jumlah[]" required>' +
                '</div>' +
                '</div>' +
                '</div>';
            $("#dynamicFields").append(newRow);
        });


    });
</script>
@endsection