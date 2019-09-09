<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gmd;
use Faker\Generator as Faker;

$factory->define(Gmd::class, function (Faker $faker) {
    return [
        'kode_gmd' =>  '000'. $faker->numberBetween(0, 100),
        'nama_gmd' => $faker->sentence(2)
    ];
});
