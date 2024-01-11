<style>
    .red-icon {
        color: red;
    }
</style>

<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">NIK</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;">No Telepon</th>
            <th style="text-align:center;">No Rekening</th>
            <th style="text-align:center;">Saldo</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nasabahs as $index => $nasabah)
        <tr>
            <td>{{ $index + 1}}</td>
            <td>{{ $nasabah->nik }}</td>
            <td>{{ $nasabah->nama }}</td>
            <td>{{ $nasabah->alamat }}</td>
            <td>{{ $nasabah->no_telepon }}</td>
            <td>{{ $nasabah->no_rekening }}</td>
            <td>Rp. {{ number_format($nasabah->saldo) }}</td>
            <td style="text-align:center;">
                <a href="{{ route('nasabah.edit', $nasabah->id) }}" role="button">
                    <i class="align-middle" data-feather="edit"></i>
                </a>
                <form style="display: inline;" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                        <i class="align-middle red-icon" data-feather="trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
