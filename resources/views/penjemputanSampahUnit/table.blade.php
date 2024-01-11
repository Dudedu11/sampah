<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Total</th>
            <th style="text-align:center;">Status</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penjemputans as $index => $penjemputan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $penjemputan->tanggal }}</td>
            <td>Rp. {{ number_format($penjemputan->total) }}</td>
            <td style="text-align:center;">
                @if($penjemputan->status == null)
                <span class="badge bg-warning">Pending</span>
                @elseif($penjemputan->status == true)
                <span class="badge bg-success">Diterima</span>
                @else
                <span class="badge bg-danger">Ditolak</span>
                @endif
            </td>
            <td style="text-align:center;">
                <a href="{{ route('penjemputanSampahUnit.show', $penjemputan->id)}}">
                    <i class="align-middle" data-feather="eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>