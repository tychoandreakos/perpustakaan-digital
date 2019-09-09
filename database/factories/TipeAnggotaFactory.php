<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipeAnggota;
use Faker\Generator as Faker;

$factory->define(TipeAnggota::class, function (Faker $faker) {
    return [
        'tipe_anggota' => $faker->word,
        'jumlah_pinjaman' => $faker->numberBetween(3, 10),
        'masa_pinjaman_buku' => $faker->numberBetween(3, 10),
        'masa_berlaku_anggota' => $faker->numberBetween(2, 10),
        'batas_perpanjangan_anggota' => $faker->numberBetween(1, 10),
        'denda' => $faker->numberBetween(500, 1000)
    ];
});
