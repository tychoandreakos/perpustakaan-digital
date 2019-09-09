<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topik;
use Faker\Generator as Faker;

$factory->define(Topik::class, function (Faker $faker) {
    $topik = $faker->sentence(2);
    return [
        'jenis_topik' => $topik,
        'warna' => $faker->hexcolor,
        'slug' => str_slug($topik),
    ];
});
