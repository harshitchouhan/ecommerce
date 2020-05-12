<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Shipping\Shipping;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'sptitle' => $faker->unique()->word,
        'sprate' => $faker->randomDigit,
        'spstate' => $faker->randomDigit,
        'spactive' => $faker->randomElement(['1','0']),
    ];
});
