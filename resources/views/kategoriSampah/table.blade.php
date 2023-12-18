<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoriSampahs as $kategoriSampah)
        <tr>
            <td>1</td>
            <td>{{ $kategoriSampah->nama }}</td>
            <td style="text-align:center;">

                <a href="{{ route('kategoriSampah.edit', ['kategoriSampah' => $kategoriSampah->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('kategoriSampah.destroy', ['kategoriSampah' => $kategoriSampah->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kategoriSampah->id }}').submit();">Delete</a>
                 <form id="delete-form-{{ $kategoriSampah->id }}" action="{{ route('kategoriSampah.destroy', ['kategoriSampah' => $kategoriSampah->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>