<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnggotaTransaksi;
use App\TipeAnggota;
use Faker\Generator as Faker;

$factory->define(AnggotaTransaksi::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Anggota::class)->create()->user_id,
        'tipe_anggota_id' => TipeAnggota::all()->random()->id,
    ];
});
