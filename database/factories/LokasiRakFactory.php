<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LokasiRak;
use Faker\Generator as Faker;

$factory->define(LokasiRak::class, function (Faker $faker) {
    return [
        'kode_lokasi' =>  '000'. $faker->numberBetween(0, 100),
        'nama_lokasi' => $faker->sentence(2)
    ];
});
