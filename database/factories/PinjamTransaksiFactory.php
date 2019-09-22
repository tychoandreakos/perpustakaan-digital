<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PinjamTransaksi;
use App\User;
use App\Bibliobigrafi;
use Faker\Generator as Faker;

$factory->define(PinjamTransaksi::class, function (Faker $faker) {
    $date = '2019-07-23 09:12:42';
    $buku = Bibliobigrafi::all()->random();
    return [
        'user_id' => User::all()->random()->id,
        'buku_id' => $buku->buku_id,
        'bibliobigrafi_id' => $buku->id,
        'tgl_pinjam' => $date,
        'tanggal_habis_pinjam' => $date,
        'tgl_kembali' => $date,
        'status_pinjam' => 0,
        'status_denda' => 0,
        'status_verifikasi' => 0,
        'kode_pinjam' => $faker->numberBetween($min = 1000, $max = 9000),
        'verified_at' => $date,
        'created_at' => $date
    ];
});
