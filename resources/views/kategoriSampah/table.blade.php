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
            <td style="text-align:center;">Aksi</td>
        </tr>
        @endforeach
    </tbody>
</table>