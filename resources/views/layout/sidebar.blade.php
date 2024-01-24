<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle">{{ $nama }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if(session('role') == 1)
            <li class="sidebar-header" style="padding-top: 5px;">
                Data Master
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listUnit.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Bank Sampah Unit</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listInduk.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Bank Sampah Induk</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listIndustri.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Industri</span>
                </a>
            </li>

            <li class="sidebar-header" style="padding-top: 5px;">
                Transaksi
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listTransaksiNasabah.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Nasabah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listTransaksiUnit.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Bank Sampah Unit</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listTransaksiInduk.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Bank Sampah Induk</span>
                </a>
            </li>

            <li class="sidebar-header" style="padding-top: 5px;">
                Lainnya
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kelolaAkun.index') }}">
                    <i class="align-middle" data-feather="repeat"></i> <span class="align-middle">Register Request</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('listRequestPendampingan.index') }}">
                    <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Request Pendampingan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('informasi.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Informasi</span>
                </a>
            </li>
            @endif

            @if(session('role') == 2)
            <li class="sidebar-header" style="padding-top: 5px;">
                Data Master
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('nasabah.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Nasabah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('jenisSampahUnit.index') }}">
                    <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Jenis Sampah</span>
                </a>
            </li>

            <li class="sidebar-header" style="padding-top: 5px;">
                Transaksi
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('transaksiNasabah.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Nasabah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('tarikTunaiNasabah.index') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Tarik Tunai Nasabah</span>
                </a>
            </li>

            @if($users->induk_id != null)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('penjemputanSampahUnit.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Request Penjemputan Sampah</span>
                </a>
            </li>
            @else
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('penguranganSampahUnit.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Pengurangan Sampah</span>
                </a>
            </li>
            @endif

            <li class="sidebar-header" style="padding-top: 5px;">
                Laporan
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanTransaksiNasabah.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Transaksi Nasabah</span>
                </a>
            </li>

            @if($users->induk_id != null)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanPenjemputanSampah.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Penjemputan Sampah</span>
                </a>
            </li>
            @else
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanPenguranganUnit.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Pengurangan Sampah</span>
                </a>
            </li>
            @endif

            <li class="sidebar-header" style="padding-top: 5px;">
                Lainnya
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('requestPendampinganUnit.index') }}">
                    <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Request Pendampingan</span>
                </a>
            </li>
            @endif

            @if(session('role') == 3 )
            <li class="sidebar-header" style="padding-top: 5px;">
                Sampah
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategoriSampah.index') }}">
                    <i class="align-middle" data-feather="trash"></i> <span class="align-middle">Kategori Sampah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('jenisSampahInduk.index') }}">
                    <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Jenis Sampah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('sampahTreatment.index') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Sampah Treatment</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('konversiSampah.index') }}">
                    <i class="align-middle" data-feather="repeat"></i> <span class="align-middle">Konversi Sampah</span>
                </a>
            </li>

            <li class="sidebar-header" style="padding-top: 5px;">
                Transaksi
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('tarikTunaiUnit.index') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Tarik Tunai Unit</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('transaksiIndustri.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Industri</span>
                </a>
            </li>


            <li class="sidebar-header" style="padding-top: 5px;">
                Laporan
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanPenjemputanSampah.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Penjemputan Sampah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanTransaksiIndustri.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Transaksi Industri</span>
                </a>
            </li>


            <li class="sidebar-header" style="padding-top: 5px;">
                Lainnya
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('sampahIndustri.index') }}">
                    <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Kebutuhan Sampah Industri</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('penjemputanSampah.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Request Penjemputan Sampah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('requestPendampinganUnit.index') }}">
                    <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Request Pendampingan</span>
                </a>
            </li>

            @endif

            @if(session('role') == 4)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('transaksiIndustri.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi Industri</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('induk.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Bank Sampah Induk</span>
                </a>
            </li>

            
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('sampahIndustri.index') }}">
                    <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Kebutuhan Sampah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('laporanTransaksiIndustri.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Laporan Transaksi</span>
                </a>
            </li>
            @endif

            @if(session('role') != 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('profile.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>