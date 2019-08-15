<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Berita;
use Faker\Generator as Faker;

$factory->define(Berita::class, function (Faker $faker) {
    $judul = $faker->sentence;
    return [
        'judul' => $judul,
        'isi' => $faker->sentence(1000),
        'slug' => str_slug($judul),
    ];
});
