<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Info;
use Faker\Generator as Faker;

$factory->define(Info::class, function (Faker $faker) {
    return [
        'regular' => 'senin - jumat',
        'waktu_regular' => '08:00 - 20:00',
        'weekend' => 'sabtu',
        'waktu_weekend' => '12:00 - 20:00',
        'waktu_istirahat' => '08:00 - 20:00',
        'alamat' => 'Jl. Jakarta No.28, Kebonwaru, Kec. Batununggal, Kota Bandung, Jawa Barat 40272',
        'no_telp' => '(021) 5711144 ',
        'pustakawan' => 'suhendry',
        'email' => 'info@stmik-amikbandung.ac.id'
    ];
});
