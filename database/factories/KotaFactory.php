<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kota;
use Faker\Generator as Faker;

$factory->define(Kota::class, function (Faker $faker) {
    return [
        'nama_kota' => $faker->city,
    ];
});
