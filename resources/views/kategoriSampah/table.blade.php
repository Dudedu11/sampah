<style>
    .red-icon {
        color: red;
    }
</style>

<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoriSampahs as $index => $kategoriSampah)
        <tr>
            <td style="text-align:center;">{{ $index + 1 }}</td>
            <td>{{ $kategoriSampah->nama }}</td>
            <td style="text-align:center;">

                <a href="{{ route('kategoriSampah.edit', $kategoriSampah->id) }}" role="button">
                    <i class="align-middle" data-feather="edit"></i>
                </a>
                <form style="display: inline;" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategoriSampah.destroy', $kategoriSampah->id) }}" method="POST">
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