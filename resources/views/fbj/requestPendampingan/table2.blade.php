<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Jenis Bank Sampah</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Keterangan</th>
            <th style="text-align:center;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($all as $index => $request)
        <tr>
            <td style="text-align:center;">{{ $index + 1 }}</td>
            <td style="text-align:center;">{{ $request->tanggal }}</td>
            <td style="text-align:center;">{{ $request->jenis }}</td>
            <td style="text-align:center;">{{ $request->nama }}</td>
            <td style="text-align:center;">{{ $request->keterangan }}</td>
            <td style="text-align:center;">
                @if($request->status == true)
                <span class="badge bg-success">Diterima</span>
                @else
                <span class="badge bg-danger">Ditolak</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>