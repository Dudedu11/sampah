<style>
    .red-icon {
        color: red;
    }
</style>

<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:5%; text-align:center;">No.</th>
            <th style="width:15%; text-align:center;">Nama Industri</th>
            <th style="width:15%; text-align:center;">Nama Sampah</th>
            <th style="width:10%; text-align:center;">Satuan</th>
            <th style="width:15%; text-align:center;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sampahIndustris as $index => $sampahIndustri)
        <tr>
            <td style="width:5%; text-align:center;">{{ $index + 1 }}</td>
            <td style="width:15%">{{ $sampahIndustri->industri->nama }}</td>
            <td style="width:15%">{{ $sampahIndustri->nama }}</td>
            <td style="width:10%; text-align:center;">{{ $sampahIndustri->satuan }}</td>
            <td style="width:15%; text-align:center;">Rp. {{ number_format($sampahIndustri->jumlah) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>