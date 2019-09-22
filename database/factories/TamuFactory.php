<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tamu;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tamu::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'created_at' => '2019-08-23 09:12:42'
    ];
});
