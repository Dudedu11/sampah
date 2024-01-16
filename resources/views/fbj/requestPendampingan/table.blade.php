<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Jenis Bank Sampah</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Keterangan</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $index => $request)
        <tr>
            <td style="text-align:center;">{{ $index + 1 }}</td>
            <td style="text-align:center;">{{ $request->tanggal }}</td>
            <td style="text-align:center;">{{ $request->jenis }}</td>
            <td style="text-align:center;">{{ $request->nama }}</td>
            <td style="text-align:center;">{{ $request->keterangan }}</td>

            <td style="text-align:center;">
                <form action="{{ route('listRequestPendampingan.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="terima">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$request->id}}">
                    <button type="submit" class="btn btn-primary">Terima</button>
                </form>
                <form action="{{ route('listRequestPendampingan.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="tolak">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$request->id}}">
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>