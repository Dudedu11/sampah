<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">NIK</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;">No Telepon</th>
            <th style="text-align:center;">No Rekening</th>
            <th style="text-align:center;">Saldo</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nasabahs as $nasabah)
        <tr>
            <td>1</td>
            <td>{{ $nasabah->nik }}</td>
            <td>{{ $nasabah->nama }}</td>
            <td>{{ $nasabah->alamat }}</td>
            <td>{{ $nasabah->no_telepon }}</td>
            <td>{{ $nasabah->no_rekening }}</td>
            <td>{{ $nasabah->saldo }}</td>
            <td style="text-align:center;">Aksi</td>
        </tr>
        @endforeach
    </tbody>
</table>