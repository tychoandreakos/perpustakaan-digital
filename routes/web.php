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

Route::view('/', 'user');
Route::view('/{any}', 'user');

// master file
Route::resource('kota', 'KotaController');
Route::resource('bahasa', 'BahasaController');
Route::resource('gmd', 'GmdController');