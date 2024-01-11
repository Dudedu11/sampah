<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            @if(session('role') == 3)
            <th style="text-align:center;">Industri</th>
            @else
            <th style="text-align:center;">Bank Sampah Induk</th>
            @endif
            <th style="text-align:center;">Total</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksiIndustris as $index => $transaksiIndustri)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $transaksiIndustri->tanggal }}</td>
            @if(session('role') == 3)
            <td>{{ $transaksiIndustri->industri->nama }}</td>
            @else
            <td>{{ $transaksiIndustri->induk->nama }}</td>
            @endif
            <td>Rp. {{ number_format($transaksiIndustri->total) }}</td>
            <td style="text-align:center;">
                <a href="{{ route('transaksiIndustri.show', $transaksiIndustri->id)}}">
                    <i class="align-middle" data-feather="eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>