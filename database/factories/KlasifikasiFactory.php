<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Klasifikasi;
use Faker\Generator as Faker;

$factory->define(Klasifikasi::class, function (Faker $faker) {
    return [
        'kode_klasifikasi' =>  '000'. $faker->numberBetween(0, 100),
        'tipe_klasifikasi' => $faker->sentence(2)
    ];
});
