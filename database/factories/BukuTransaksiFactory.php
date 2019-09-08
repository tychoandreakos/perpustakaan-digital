<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BukuTransaksi;
use Faker\Generator as Faker;
use App\Buku;
use App\Pengarang;
use App\Bahasa;
use App\Penerbit;
use App\Kota;

$factory->define(BukuTransaksi::class, function (Faker $faker) {
    return [
        'buku_id' => Buku::all()->random()->id,
        'pengarang_id' => Pengarang::all()->random()->id,
        'kota_id' => Kota::all()->random()->id,
        'bahasa_id' => Bahasa::all()->random()->id,
        'penerbit_id' => Penerbit::all()->random()->id,
    ];
});
