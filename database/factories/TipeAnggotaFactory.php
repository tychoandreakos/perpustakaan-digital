<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipeAnggota;
use Faker\Generator as Faker;

$factory->define(TipeAnggota::class, function (Faker $faker) {
    return [
        'tipe_anggota' => 'standard',
        'jumlah_pinjaman' => 3,
        'masa_pinjaman_buku' => 7,
        'masa_berlaku_anggota' => 2,
        'batas_perpanjangan_anggota' => 2,
        'denda' => 500
    ];
});
