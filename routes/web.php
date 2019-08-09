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

Route::get('/', function () {
    return view('user');
});

// Route::view('/', 'user');
// Route::view('/{any}', 'user');

// admin prefix

Route::prefix('pustakawan')->group( function() {

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
Route::get('eksemplar-fetch', 'EksemplarTransaksiController@fetch')->name('transaksi-eksemplar.fetch');
Route::get('anggota-fetch', 'AnggotaController@fetch')->name('anggota.fetch');



// Bibliobigrafi
Route::get('bibliobigrafi-fetch-pengarang', 'BibliobigrafiController@pengarang')->name('bibliobigrafi.pengarang');
Route::get('bibliobigrafi-fetch-penerbit', 'BibliobigrafiController@penerbit')->name('bibliobigrafi.penerbit');
Route::get('bibliobigrafi-fetch-kota', 'BibliobigrafiController@kota')->name('bibliobigrafi.kota');
Route::get('bibliobigrafi-fetch-gmd', 'BibliobigrafiController@gmd')->name('bibliobigrafi.gmd');
Route::get('bibliobigrafi-fetch-klasifikasi', 'BibliobigrafiController@klasifikasi')->name('bibliobigrafi.klasifikasi');
Route::get('bibliobigrafi-fetch-lokasi', 'BibliobigrafiController@lokasi')->name('bibliobigrafi.lokasi');
Route::get('bibliobigrafi-fetch-bahasa', 'BibliobigrafiController@bahasa')->name('bibliobigrafi.bahasa');
Route::get('bibliobigrafi-fetch-pola', 'BibliobigrafiController@pola')->name('bibliobigrafi.pola');

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


});