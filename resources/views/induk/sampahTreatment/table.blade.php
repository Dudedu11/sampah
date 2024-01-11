<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:5%; text-align:center;">No.</th>
            <th style="width:15%; text-align:center;">Nama</th>
            <th style="width:10%; text-align:center;">Satuan</th> 
            <th style="width:8%; text-align:center;">Stok</th>
            <th style="width:15%; text-align:center;">Harga</th>
            <th style="width:25%; text-align:center;">Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sampahTreatments as $index => $sampahTreatment)
        <tr>
            <td style="width:5%">{{ $index + 1 }}</td>
            <td style="width:15%">{{ $sampahTreatment->nama }}</td>
            <td style="width:10%; text-align:center;">{{ $sampahTreatment->satuan }}</td> 
            <td style="width:8%; text-align:center;">{{ $sampahTreatment->stok}}</td>
            <td style="width:15%">Rp. {{ number_format($sampahTreatment->harga) }}</td>
            <td style="width:25%">{{ $sampahTreatment->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>