<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Satuan</th>
            <th style="text-align:center;">Harga Beli</th>
            <th style="text-align:center;">Harga Jual</th>
            <th style="text-align:center;">Stok</th>
            <th style="text-align:center;">Deskripsi</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisSampahs as $index => $jenisSampah)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $jenisSampah->nama }}</td>
                <td style="text-align:center;">{{ $jenisSampah->satuan }}</td>
                <td style="text-align:center;">{{ $jenisSampah->harga_beli }}</td>
                <td style="text-align:center;">{{ $jenisSampah->harga_jual }}</td>
                <td style="text-align:center;">{{ $jenisSampah->stok }}</td>
                <td style="text-align:center;">{{ $jenisSampah->deskripsi }}</td>
                <td style="text-align:center;">
                    <!-- Tambahkan tombol aksi sesuai kebutuhan Anda -->
                    <button class="btn btn-info">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
