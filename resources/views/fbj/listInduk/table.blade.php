<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;">No Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach($induks as $index => $induk)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $induk->nama }}</td>
            <td>{{ $induk->alamat }}</td>
            <td>{{ $induk->no_telepon }}</td>
        </tr>
        @endforeach
    </tbody>
</table>