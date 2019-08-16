<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topik;
use Faker\Generator as Faker;

$factory->define(Topik::class, function (Faker $faker) {
    return [
        'jenis_topik' => 'arsitektur',
        'img' => '3_2.jpg',
        'slug' => str_slug('arsitektur'),
    ];
});
