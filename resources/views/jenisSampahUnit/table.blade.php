<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:5%; text-align:center;">No.</th>
            <th style="width:15%; text-align:center;">Nama</th>
            <th style="width:10%; text-align:center;">Satuan</th> 
            <th style="width:15%; text-align:center;">Harga Jual</th>
            <th style="width:15%; text-align:center;">Harga Beli</th>
            <th style="width:25%; text-align:center;">Deskripsi</th>
            <th style="width:5%; text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisSampahs as $index => $jenisSampah)
        <tr>
            <td style="width:5%">{{ $index + 1 }}</td>
            <td style="width:15%">{{ $jenisSampah->nama }}</td>
            <td style="width:10%; text-align:center;">{{ $jenisSampah->satuan }}</td>
            <td style="width:15%">Rp. {{ number_format($jenisSampah->harga_jual) }}</td> 
            <td style="width:15%">Rp. {{ number_format($jenisSampah->harga_beli) }}</td>
            <td style="width:25%">{{ $jenisSampah->deskripsi }}</td>
            <td style="width:5%; text-align:center;">
            <a href="{{ route('jenisSampahUnit.edit', $jenisSampah->id) }}" role="button">
                    <i class="align-middle" data-feather="edit"></i>
                </a>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>