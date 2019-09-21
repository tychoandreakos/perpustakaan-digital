<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anggota;
use App\TipeAnggota;
use App\Jurusan;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Anggota::class, function (Faker $faker) {
    $dt = Carbon::now();
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'jurusan_id' => Jurusan::all()->random()->id,
        'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tgl_registrasi' => now(),
        'tgl_expired' => $dt->addYears((int)TipeAnggota::all()->random()->masa_berlaku_anggota),
        'alamat' => $faker->address,
        'jk' => $faker->numberBetween(0, 1),
        'no_telp' => $faker->phoneNumber,
        'foto' => 'img.svg'
    ];
});
