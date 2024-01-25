<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Foto</th>
            <th style="text-align:center;">Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($informasis as $index => $informasi)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td style="text-align:center;">
                <img src="{{ asset('storage/foto/' . $informasi->foto) }}" alt="Foto" style="max-width: 100px; max-height: 100px;">
            </td>
            <td style="text-align:center;">{{ $informasi->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>