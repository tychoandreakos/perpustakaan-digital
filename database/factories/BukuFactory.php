<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buku;
use Faker\Generator as Faker;

$factory->define(Buku::class, function (Faker $faker) {
    $judul = $faker->sentence;
    return [
        'judul' => $judul,
        'edisi' => $faker->sentence(),
        'tahun_terbit' => $faker->year(),
        'isbn_isnn' => $faker->randomNumber(),
        'deskripsi_fisik' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'judul_seri' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'catatan' => $faker->paragraph(),
        'slug' => str_slug($judul),
        
        'gambar_sampul' => ''
    ];
});
