<table class="table table-bordered" id="example" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th style="text-align:center;">Tanggal</th>
            <th style="text-align:center;">Nama Sampah</th>
            <th style="text-align:center;">Jumlah</th>
            <th style="text-align:center;">Sampah Treatment</th>
            <th style="text-align:center;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konversiSampahs as $index => $konversiSampah)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $konversiSampah->tanggal }}</td>
            <td>{{ $konversiSampah->jenisSampah->nama }}</td>
            <td>{{ $konversiSampah->jumlah_sampah }}</td>
            <td>{{ $konversiSampah->sampahTreatment->nama }}</td>
            <td>{{ $konversiSampah->jumlah_treatment }}</td>
        </tr>
        @endforeach
    </tbody>
</table>