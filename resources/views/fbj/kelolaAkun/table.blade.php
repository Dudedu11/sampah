<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Jenis Akun</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;">No Telepon</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelolaAkuns as $index => $kelolaAkun)
        <tr>
            <td>{{ $index + 1 }}</td>
            @if($kelolaAkun->role_id == 2)
            <td>{{ $kelolaAkun->units->first()->nama }}</td>
            <td>Bank Sampah Unit</td>
            <td>{{ $kelolaAkun->units->first()->alamat }}</td>
            <td>{{ $kelolaAkun->units->first()->no_telepon }}</td>
            @elseif($kelolaAkun->role_id == 3)
            <td>{{ $kelolaAkun->induks->first()->nama }}</td>
            <td>Bank Sampah Induk</td>
            <td>{{ $kelolaAkun->induks->first()->alamat }}</td>
            <td>{{ $kelolaAkun->induks->first()->no_telepon }}</td>
            @else
            <td>{{ $kelolaAkun->industris->first()->nama }}</td>
            <td>Industri</td>
            <td>{{ $kelolaAkun->industris->first()->alamat }}</td>
            <td>{{ $kelolaAkun->industris->first()->no_telepon }}</td>
            @endif
            <td>
                <form action="{{ route('kelolaAkun.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="terima">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$kelolaAkun->id}}">
                    <button type="submit" class="btn btn-primary">Terima</button>
                </form>
                <form action="{{ route('kelolaAkun.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" class="form-control" name="aksi" id="aksi" value="tolak">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$kelolaAkun->id}}">
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>