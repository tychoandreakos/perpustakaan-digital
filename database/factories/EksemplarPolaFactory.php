<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EksemplarPola;
use Faker\Generator as Faker;

$factory->define(EksemplarPola::class, function (Faker $faker) {
    $kode = strtoupper($faker->randomLetter) . $faker->numberBetween(000, 999);
    return [
        'kode_eksemplar' => $kode,
        'prefix' => 1,
        'serial' => 3,
        'suffix' => 0,
    ];
});
