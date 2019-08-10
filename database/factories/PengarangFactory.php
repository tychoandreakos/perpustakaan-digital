<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengarang;
use Faker\Generator as Faker;

$factory->define(Pengarang::class, function (Faker $faker) {
    return [
        'nama_pengarang' => $faker->name,
        'tahun_lahir' => $faker->date
    ];
});
