<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Discounts\Discount;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'dname' => $faker->unique()->word,
        'dcode' => $faker->randomDigit,
        'dvalue' => $faker->randomDigit,
        'dtype' => $faker->word,
        'duses' => $faker->randomDigit,
        'dstartdate' => $faker->dateTime(),
        'dexpirydate' => $faker->dateTime(),
        'dactive' => $faker->randomElement(['1','0']),
        'dbasis' => $faker->randomElement(['1','0']),
    ];
});
