<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EksemplarTransaksi;
use App\EksemplarPola;
use Faker\Generator as Faker;

$factory->define(EksemplarTransaksi::class, function (Faker $faker) {
    $pola = EksemplarPola::all()->random()->kode_eksemplar;
    return [
       'pola_eksemplar' => $pola . $faker->numberBetween(0, 10000),
       'kode_eksemplar' => $pola,
    ];
});
