<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Bank Sampah Unit</th>
            <th style="text-align:center;">Jumlah</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarikTunais as $index => $tarikTunai)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $tarikTunai->tanggal }}</td>
            <td>{{ $tarikTunai->unit->nama }}</td>
            <td>Rp. {{ number_format($tarikTunai->total) }}</td>
            <td style="text-align:center;">
                <a href="{{ route('tarikTunaiUnit.edit', $tarikTunai->id)}}">
                    <i class="align-middle" data-feather="eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>