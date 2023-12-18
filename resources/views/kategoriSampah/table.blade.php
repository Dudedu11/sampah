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
            <td></td>
            <td>{{ $kategoriSampah->nama }}</td>
            <td style="text-align:center;">

                <a href="{{ route('kategoriSampah.edit', ['kategoriSampah' => $kategoriSampah->id]) }}"
                    class="text-primary icon-link" data-feather="edit" title="Edit"
                    onclick="event.preventDefault(); window.location.href='{{ route('kategoriSampah.edit', ['kategoriSampah' => $kategoriSampah->id]) }}';"></a>

                <a href="{{ route('kategoriSampah.destroy', ['kategoriSampah' => $kategoriSampah->id]) }}"
                    class="text-danger icon-link"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kategoriSampah->id }}').submit();"
                    data-feather="trash-2" title="Delete"></a>

                <form id="delete-form-{{ $kategoriSampah->id }}"
                    action="{{ route('kategoriSampah.destroy', ['kategoriSampah' => $kategoriSampah->id]) }}"
                    method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>