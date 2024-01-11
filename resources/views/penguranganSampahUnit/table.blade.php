<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Keterangan</th>
            <th style="text-align:center;">Total</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengurangans as $index => $pengurangan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pengurangan->tanggal }}</td>
            <td>{{ $pengurangan->keterangan }}</td>
            <td>Rp. {{ number_format($pengurangan->total) }}</td>
            <td style="text-align:center;">
                <a href="{{ route('penguranganSampahUnit.show', $pengurangan->id)}}">
                    <i class="align-middle" data-feather="eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>