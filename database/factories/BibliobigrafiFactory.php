<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bibliobigrafi;
use App\Klasifikasi;
use App\Gmd;
use App\Buku;
use App\EksemplarPola;
use App\Koleksi;
use App\LokasiRak;
use Faker\Generator as Faker;

$factory->define(Bibliobigrafi::class, function (Faker $faker) {
    return [
       'buku_id' => Buku::all()->random()->id,
       'klasifikasi_id' => Klasifikasi::all()->random()->id,
       'gmd_id' => Gmd::all()->random()->id,
       'pola_eksemplar' => factory(App\EksemplarTransaksi::class)->create()->pola_eksemplar,
       'koleksi_id' => Koleksi::all()->random()->id,
       'lokasi_rak_id' => LokasiRak::all()->random()->id,
       'no_panggil' => $faker->sentence(4),
       'status_pinjam' => 0
    ];
});
