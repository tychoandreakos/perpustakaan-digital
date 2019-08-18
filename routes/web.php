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

Route::get('/', 'LandingController@index')->name('landing');
Route::get('berita/{slug}', 'LandingController@berita');
Route::get('buku/{slug}', 'LandingController@buku');
Route::get('baca/{slug}', 'LandingController@baca');

Route::get('/daftar-tamu', function() {
    return view('tamu');
})->name('user.tamu');

Route::get('users', function(){
    return view('homes');
});

// fetch
Route::post('buku-tamu', 'ToolController@tamu')->name('tool.tamu');

// Route::view('/', 'user');
// Route::view('/{any}', 'user');

// admin prefix
Route::prefix('pustakawan')->namespace('Admin')->group(function() {

    Route::view('/', 'admin.home')->name('home');


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


// transaksi file
Route::resource('bibliobigrafi', 'BibliobigrafiController');
Route::resource('transaksi-eksemplar', 'EksemplarTransaksiController');

// fetch
Route::get('gmd-fetch', 'GmdController@fetch')->name('gmd.fetch');
Route::get('penerbit-fetch', 'PenerbitController@fetch')->name('penerbit.fetch');
Route::get('buku-fetch', 'BukuController@fetch')->name('buku.fetch');
Route::get('pengarang-fetch', 'PengarangController@fetch')->name('pengarang.fetch');
Route::get('kota-fetch', 'KotaController@fetch')->name('kota.fetch');
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
Route::get('topik-fetch', 'TopikController@fetch')->name('topik.fetch');


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
Route::get('histori-fecth', 'PinjamController@histori')->name('histori.fetch');

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

// tool
Route::get('sirkulasi', function() {
    $title = 'Sirkulasi';
    return view('admin.sirkulasi.sirkulasi', compact('title'));
})->name('sirkulasi.index');
Route::get('sirkulasi/{$id}', function() {
    $title = 'Sirkulasi';
    return view('admin.sirkulasi.table', compact('title'));
})->name('sirkulasi.pinjam');
Route::get('pengembalian', function() {
    $title = 'Pengembalian Buku';
    return view('admin.sirkulasi.kembali', compact('title'));
})->name('sirkulasi.pengembalian');
Route::get('histori', function(){
    $title = 'Histori Peminjaman';
    return view('admin.sirkulasi.histori', compact('title'));
})->name('sirkulasi.histori');

Route::post('pinjam', 'PinjamController@store')->name('pinjam.store');
Route::get('pinjaman', 'PinjamController@pinjaman')->name('pinjam.pinjaman');
Route::post('perpanjang', 'PinjamController@perpanjang')->name('pinjam.perpanjang');
Route::get('kembali', 'PinjamController@kembali')->name('sirkulasi.kembali');
Route::get('last', 'TopikController@last')->name('topik.last');


// eksemplar keluar
Route::get('eksemplar-keluar', function() {
    $title = 'Daftar Eksemplar Keluar';
    return view('admin.eksemplar.home', compact('title'));    
})->name('eksemplar.keluar');


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
