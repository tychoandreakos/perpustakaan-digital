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


// transaksi file
Route::resource('bibliobigrafi', 'BibliobigrafiController');

// fetch
Route::get('gmd-fetch', 'GmdController@fetch')->name('gmd.fetch');
Route::get('penerbit-fetch', 'PenerbitController@fetch')->name('penerbit.fetch');
Route::get('buku-fetch', 'BukuController@fetch')->name('buku.fetch');
Route::get('pengarang-fetch', 'PengarangController@fetch')->name('pengarang.fetch');
Route::get('kota-fetch', 'KotaController@fetch')->name('kota.fetch');
Route::get('klasifikasi-fetch', 'KlasifikasiController@fetch')->name('klasifikasi.fetch');


// search
Route::get('gmd-search', 'GmdController@search');
Route::get('penerbit-search', 'PenerbitController@search');
Route::get('buku-search', 'BukuController@search');
Route::get('pengarang-search', 'PengarangController@search');
Route::get('kota-search', 'KotaController@search');
Route::get('klasifikasi-search', 'KlasifikasiController@search');


});