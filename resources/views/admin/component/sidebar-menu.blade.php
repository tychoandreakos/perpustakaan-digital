<!-- Navigation -->
<ul class="navbar-nav">
    <li class="nav-item active">
        <a class=" nav-link active " href="{{ route('home') }}"> <i class="ni ni-tv-2 text-primary"></i> Beranda
        </a>
    </li>
    <li class="nav-item">
        <div class="dropdown" style="width:100%">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i
                    class="ni ni-book-bookmark text-blue"></i>
                Bibliobigrafi</a>
            <div class="dropdown-menu" style="left: 15px;">
                <a href="{{ route('bibliobigrafi.index') }}" class="dropdown-item">Daftar Bibliobigrafi</a>
                <a href="#" class="dropdown-item">Tambah Bibliobigrafi</a>
                <a href="#" class="dropdown-item">Daftar Eksemplar</a>
                <a href="#" class="dropdown-item">Eksemplar Keluar</a>
                <a href="#" class="dropdown-item">Cetak Label</a>
                <a href="#" class="dropdown-item">Eksport Data</a>
                <a href="#" class="dropdown-item">Import Data</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown" style="width:100%">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="ni ni-compass-04 text-orange"></i> Sirkulasi
            </a>
            <div class="dropdown-menu" style="left: 15px;">
                <a href="#" class="dropdown-item">Mulai Transaksi</a>
                <a href="#" class="dropdown-item">Pengembalian Buku</a>
                <a href="#" class="dropdown-item">Histori Peminjaman</a>
                <a href="#" class="dropdown-item">Daftar Keterlambatan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown" style="width:100%">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="ni ni-single-02 text-yellow"></i> Keanggotaan
            </a>
            <div class="dropdown-menu" style="left: 15px;">
                <a href="#" class="dropdown-item">Lihat Daftar Anggota</a>
                <a href="#" class="dropdown-item">Tambah Anggota</a>
                <a href="#" class="dropdown-item">Tipe Keanggotaan</a>
                <a href="#" class="dropdown-item">Cetak Kartu Anggota</a>
                <a href="#" class="dropdown-item">Eksport Data</a>
                <a href="#" class="dropdown-item">Import Data</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown" style="width:100%">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="ni ni-archive-2 text-pink"></i> Master File
            </a>
            <div class="dropdown-menu" style="left: 15px;">
                <a href="{{ route('gmd.index') }}" class="dropdown-item">GMD</a>
                <a href="{{ route('penerbit.index') }}" class="dropdown-item">Penerbit</a>
                <a href="{{ route('buku.index') }}" class="dropdown-item">Buku</a>
                <a href="{{ route('pengarang.index') }}" class="dropdown-item">Pengarang</a>
                <a href="{{ route('kota.index') }}" class="dropdown-item">Kota</a>
                <a href="#" class="dropdown-item">Klasifikasi</a>
                <a href="#" class="dropdown-item">Bahasa</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown" style="width:100%">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="ni ni-chart-bar-32 text-info"></i> Laporan
            </a>
            <div class="dropdown-menu" style="left: 15px;">
                <a href="#" class="dropdown-item">Statistik Koleksi Buku</a>
                <a href="#" class="dropdown-item">Laporan Peminjaman</a>
                <a href="#" class="dropdown-item">Laporan Anggota</a>
                <a href="#" class="dropdown-item">Rekapitulasi</a>
                <a href="#" class="dropdown-item">Statistik Pengunjung</a>
                <a href="#" class="dropdown-item">Statistik Pengunjung (Per Hari)</a>
            </div>
        </div>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Lainnya </h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-align-left-2"></i> Daftar Pengunjung
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-collection"></i> Laporan Denda
        </a>
    </li>
</ul>
