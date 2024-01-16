<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Bank Sampah Induk</th>
            <th style="text-align:center;">Bank Sampah Unit</th>
            <th style="text-align:center;">Total</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $index => $transaksi)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $transaksi->tanggal }}</td>
            <td>{{ $transaksi->induk->nama }}</td>
            <td>{{ $transaksi->unit->nama }}</td>
            <td>Rp. {{ number_format($transaksi->total) }}</td>
            <td style="text-align:center;">
                <a href="{{ route('penjemputanSampah.show', $transaksi->id)}}">
                    <i class="align-middle" data-feather="eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>