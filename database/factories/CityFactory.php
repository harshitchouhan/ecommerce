<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\City\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'cityname' => $faker->unique()->word,
        'citycode' => $faker->randomDigit,
        'cityactive' => $faker->randomElement(['1','0']),
    ];
});
