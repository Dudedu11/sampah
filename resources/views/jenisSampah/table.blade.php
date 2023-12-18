<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Kategori Sampah</th>
            <th style="text-align:center;">Jenis Sampah</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisSampahs as $index => $jenisSampah)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $jenisSampah->kategori->nama }}</td> <!-- Mengakses properti nama dari objek kategori -->
                <td>{{ $jenisSampah->nama }}</td>
                <td style="text-align:center;">
                    <a href="{{ route('jenisSampah.edit', ['jenisSampah' => $jenisSampah->id]) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('jenisSampah.destroy', ['jenisSampah' => $jenisSampah->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $jenisSampah->id }}').submit();">Hapus</a>
                    <form id="delete-form-{{ $jenisSampah->id }}" action="{{ route('jenisSampah.destroy', ['jenisSampah' => $jenisSampah->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

