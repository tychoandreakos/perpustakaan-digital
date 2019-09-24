<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user');
// });

use Illuminate\Support\Carbon;

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'LandingController@index')->name('landing');
Route::get('/cari', 'LandingController@cari')->name('cari');
Route::get('berita/{slug}', 'LandingController@berita')->name('berita');
Route::get('berita-semua', 'LandingController@beritaSemua')->name('berita.semua');
Route::get('tamu', 'LandingController@tamu')->name('tamu');
Route::get('buku/{slug}', 'LandingController@buku')->name('buku');
Route::post('tamu', 'LandingController@tamu_store')->name('tamu.store');
Route::get('search', 'LandingController@search')->name('search');
Route::get('pengunjung-chart', 'LandingController@chart');


Route::middleware(['auth'])->group(function () {
    Route::get('/approval', 'LandingController@approval')->name('approval');
    
    Route::middleware(['approved'])->group(function () {
        Route::get('beranda', 'LandingController@beranda')->name('beranda');
        Route::get('baca/{slug}', 'LandingController@baca')->name('baca');
        Route::get('koleksi-terbaru', 'LandingController@terbaru')->name('terbaru');
        Route::get('pinjam/{slug}', 'LandingController@pinjam')->name('pinjam');
        Route::get('lengkapi-profile', 'LandingController@lengkapi')->name('profile.lengkapi');
        Route::get('pinjaman', 'LandingController@pinjaman')->name('pinjaman');
        Route::get('tags/{id}', 'LandingController@tags')->name('tags');

        Route::post('update-profile', 'LandingController@update_profile')->name('lengkapi.profile');
        Route::post('batal', 'LandingController@batal')->name('batal');
    });
   
});


// admin prefix
Route::prefix('pustakawan')->namespace('Admin')->middleware('auth:admin')->group(function() {

    Route::get('/beranda', 'homePageController@index')->name('home');


// master file
Route::resource('kota', 'KotaController');
Route::resource('bahasa', 'BahasaController');
Route::resource('gmd', 'GmdController');
Route::resource('penerbit', 'PenerbitController');
Route::resource('pengarang', 'PengarangController');
Route::resource('subyek', 'SubyekController');
Route::resource('lokasi', 'LokasiRakController');
Route::resource('koleksi', 'KoleksiController');
Route::resource('buku', 'BukuController');
Route::resource('klasifikasi', 'KlasifikasiController');
Route::resource('tipe-anggota', 'TipeAnggotaController');
Route::resource('eksemplar', 'EksemplarPolaController');
Route::resource('anggota', 'AnggotaController');
Route::resource('berita', 'BeritaController');
Route::resource('info', 'InfoController');
Route::resource('topik', 'TopikController');
Route::resource('denda', 'DendaController');
Route::resource('jurusan', 'JurusanController');


// transaksi file
Route::resource('bibliobigrafi', 'BibliobigrafiController');
Route::resource('transaksi-eksemplar', 'EksemplarTransaksiController');

// fetch
Route::get('gmd-fetch', 'GmdController@fetch')->name('gmd.fetch');
Route::get('penerbit-fetch', 'PenerbitController@fetch')->name('penerbit.fetch');
Route::get('buku-fetch', 'BukuController@fetch')->name('buku.fetch');
Route::get('pengarang-fetch', 'PengarangController@fetch')->name('pengarang.fetch');
Route::get('kota-fetch', 'KotaController@fetch')->name('kota.fetch');
Route::get('jurusan-fetch', 'JurusanController@fetch')->name('jurusan.fetch');
Route::get('denda-fetch', 'DendaController@fetch')->name('denda.fetch');
Route::get('klasifikasi-fetch', 'KlasifikasiController@fetch')->name('klasifikasi.fetch');
Route::get('bahasa-fetch', 'BahasaController@fetch')->name('bahasa.fetch');
Route::get('tipe-anggota-fetch', 'TipeAnggotaController@fetch')->name('tipe-anggota.fetch');
Route::get('bibliobigrafi-fetch', 'BibliobigrafiController@fetch')->name('bibliobigrafi.fetch');
Route::get('bibliobigrafi-sirkulasi', 'BibliobigrafiController@sirkulasi')->name('bibliobigrafi.sirkulasi');
Route::get('eksemplar-fetch', 'EksemplarTransaksiController@fetch')->name('transaksi-eksemplar.fetch');
Route::get('anggota-fetch', 'AnggotaController@fetch')->name('anggota.fetch');
Route::get('eksemplar-keluar-fetch', 'PinjamController@eksemplar')->name('eksemplar-keluar.fetch');
Route::get('pengembalian-fetch', 'PinjamController@pengembalian')->name('pengembalian.fetch');
Route::get('berita-fetch', 'BeritaController@fetch')->name('berita.fetch');
Route::get('info-fetch', 'InfoController@fetch')->name('info.fetch');
Route::get('lokasi-fetch', 'LokasiRakController@fetch')->name('lokasi.fetch');
Route::get('topik-fetch', 'TopikController@fetch')->name('topik.fetch');
Route::get('tamu-fetch', 'BukuTamuController@fetch')->name('tamu.fetch');
Route::get('terlambat-fetch', 'PinjamController@terlambat')->name('terlambat.fetch');
Route::get('koleksi-fetch', 'KoleksiController@fetch')->name('koleksi.fetch');



Route::get('denda-user/{id}', 'PinjamController@denda')->name('sirkulasi.denda');
Route::post('denda/bayar', 'DendaController@store')->name('denda');

// print laporan
Route::get('laporan-koleksi-stmik', 'LaporanController@print_koleksi')->name('print.koleksi');
Route::get('laporan-buku', 'LaporanController@print_buku_bulan_ini')->name('print.buku_ini');
Route::get('laporan-pinjam', 'LaporanController@print_pinjam')->name('print.pinjam');
Route::get('laporan-anggota', 'LaporanController@print_anggota')->name('print.anggota');
Route::get('laporan-tamu', 'LaporanController@print_tamu')->name('print.tamu');
Route::get('laporan-denda-harian', 'LaporanController@denda_harian')->name('print.harian');
Route::get('laporan-denda-bulanan', 'LaporanController@denda_bulanan')->name('print.bulanan');
Route::get('laporan-denda-mingguan', 'LaporanController@denda_mingguan')->name('print.mingguan');
Route::get('laporan-denda-tahunan', 'LaporanController@denda_tahunan')->name('print.tahunan');

// Bibliobigrafi
Route::get('bibliobigrafi-fetch-pengarang', 'BibliobigrafiController@pengarang')->name('bibliobigrafi.pengarang');
Route::get('bibliobigrafi-fetch-penerbit', 'BibliobigrafiController@penerbit')->name('bibliobigrafi.penerbit');
Route::get('bibliobigrafi-fetch-kota', 'BibliobigrafiController@kota')->name('bibliobigrafi.kota');
Route::get('bibliobigrafi-fetch-gmd', 'BibliobigrafiController@gmd')->name('bibliobigrafi.gmd');
Route::get('bibliobigrafi-fetch-klasifikasi', 'BibliobigrafiController@klasifikasi')->name('bibliobigrafi.klasifikasi');
Route::get('bibliobigrafi-fetch-lokasi', 'BibliobigrafiController@lokasi')->name('bibliobigrafi.lokasi');
Route::get('bibliobigrafi-fetch-koleksi', 'BibliobigrafiController@koleksi')->name('bibliobigrafi.koleksi');
Route::get('bibliobigrafi-fetch-bahasa', 'BibliobigrafiController@bahasa')->name('bibliobigrafi.bahasa');
Route::get('bibliobigrafi-fetch-pola', 'BibliobigrafiController@pola')->name('bibliobigrafi.pola');
Route::get('histori-fetch', 'PinjamController@histori')->name('histori.fetch');
Route::get('bibliobigrafi-fetch-topik', 'BibliobigrafiController@topik')->name('bibliobigrafi.topik');


// email
Route::post('send', 'PinjamController@send')->name('send');

// search
Route::get('gmd-search', 'GmdController@search');
Route::get('penerbit-search', 'PenerbitController@search');
Route::get('buku-search', 'BukuController@search');
Route::get('pengarang-search', 'PengarangController@search');
Route::get('kota-search', 'KotaController@search');
Route::get('klasifikasi-search', 'KlasifikasiController@search');
Route::get('bahasa-search', 'BahasaController@search');
Route::get('tipe-anggota-search', 'TipeAnggotaController@search');
Route::get('bibliobigrafi-search', 'BibliobigrafiController@search');
Route::get('eksemplar-search', 'EksemplarTransaksiController@search');
Route::get('anggota-search', 'AnggotaController@search');
Route::get('eksemplar-keluar-search', 'PinjamController@search');
Route::get('berita-search', 'BeritaController@search');
Route::get('topik-search', 'TopikController@search');
Route::get('pengunjung-search', 'BukuTamuController@search');
Route::get('histori-search', 'SirkulasiController@search');
Route::get('terlambat-search', 'SirkulasiController@search_terlambat');
Route::get('jurusan-search', 'JurusanController@search');
Route::get('koleksi-search', 'KoleksiController@search');
Route::get('denda-search', 'DendaController@search');

// chart
Route::get('anggota-chart', 'AnggotaController@chart');
Route::get('buku-chart', 'BukuController@chart');
Route::get('pinjam-chart', 'PinjamController@chart');
Route::get('pengunjung-chart', 'BukuTamuController@chart');

// laporan
Route::get('statistik-koleksi-buku', 'LaporanController@koleksi')->name('laporan.koleksi');
Route::get('statistik-anggota', 'LaporanController@anggota')->name('laporan.anggota');
Route::get('statistik-pinjam', 'LaporanController@pinjam')->name('laporan.pinjam');
Route::get('statistik-pengunjung', 'LaporanController@pengunjung')->name('laporan.pengunjung');


// tool
Route::get('sirkulasi', 'SirkulasiController@sirkulasi')->name('sirkulasi.index');
Route::get('pengembalian', 'SirkulasiController@pengembalian')->name('sirkulasi.pengembalian');
Route::get('histori', 'SirkulasiController@histori')->name('sirkulasi.histori');
Route::get('daftar-pengunjung', 'SirkulasiController@pengunjung')->name('pengunjung');
Route::get('daftar-keterlambatan', 'SirkulasiController@keterlambatan')->name('keterlambatan');
Route::get('sirkulasi-digital', 'SirkulasiController@digital')->name('sirkulasi.digital');
Route::get('eksemplar-keluar', 'SirkulasiController@keluar')->name('eksemplar.keluar');
Route::post('sirkulasi-verifikasi', 'SirkulasiController@verifikasi')->name('sirkulasi.verifikasi');
Route::post('sirkulasi-digital-pinjam', 'SirkulasiController@pinjam')->name('sirkulasi.digital2');
Route::get('sirkulasi-pola', 'SirkulasiController@pola')->name('sirkulasi.pola');

Route::post('sirkulasi-pola', 'SirkulasiController@pola')->name('sirkulasi.pola2');
Route::post('anggota-approve/{id}', 'AnggotaController@verifikasi');

// pinjam
Route::post('pinjam', 'PinjamController@store')->name('pinjam.store');
Route::get('pinjaman', 'PinjamController@pinjaman')->name('pinjam.pinjaman');
Route::get('saat-ini', 'PinjamController@saat_ini')->name('saat.ini');
Route::post('perpanjang', 'PinjamController@perpanjang')->name('pinjam.perpanjang');
Route::get('kembali', 'PinjamController@kembali')->name('sirkulasi.kembali');
Route::post('kembali2', 'PinjamController@kembali')->name('sirkulasi.kembali2');
Route::get('last', 'TopikController@last')->name('topik.last');



});

