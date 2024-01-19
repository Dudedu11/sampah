<style>
    .red-icon {
        color: red;
    }
</style>

<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:5%; text-align:center;">No.</th>
            <th style="width:15%; text-align:center;">Nama</th>
            <th style="width:15%; text-align:center;">Kategori Sampah</th>
            <th style="width:10%; text-align:center;">Satuan</th>
            <th style="width:10%; text-align:center;">Stok</th>
            <th style="width:15%; text-align:center;">Harga</th>
            <th style="width:25%; text-align:center;">Deskripsi</th>
            <th style="width:15%; text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisSampahs as $index => $jenisSampah)
        <tr>
            <td style="width:5%; text-align:center;">{{ $index + 1 }}</td>
            <td style="width:15%">{{ $jenisSampah->nama }}</td>
            <td style="width:15%">{{ $jenisSampah->kategori->nama }}</td>
            <td style="width:10%; text-align:center;">{{ $jenisSampah->satuan }}</td>
            <td style="width:10%; text-align:center;">{{ $jenisSampah->stok }}</td>
            <td style="width:15%">Rp. {{ number_format($jenisSampah->harga) }}</td>
            <td style="width:25%">{{ $jenisSampah->deskripsi }}</td>
            <td style="width:15%; text-align:center;">

                <a href="{{ route('jenisSampahInduk.edit', $jenisSampah->id) }}" role="button">
                    <i class="align-middle" data-feather="edit"></i>
                </a>
                <form style="display: inline;" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jenisSampahInduk.destroy', $jenisSampah->id) }}" method="POST">
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