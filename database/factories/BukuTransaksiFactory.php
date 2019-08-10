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
        'buku_id' => factory(Buku::class)->create()->id,
        'pengarang_id' => factory(Pengarang::class)->create()->id,
        'kota_id' => factory(Kota::class)->create()->id,
        'bahasa_id' => factory(Bahasa::class)->create()->id,
        'penerbit_id' => factory(Penerbit::class)->create()->id,
    ];
});
