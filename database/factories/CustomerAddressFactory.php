<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\CustomerAddress\CustomerAddress;
use App\Model;
use Faker\Generator as Faker;

$factory->define(CustomerAddress::class, function (Faker $faker) {
    return [
        'caownername' => $faker->unique()->word,
        'caaddressline1' => $faker->streetAddress,
        'caaddressline2' => $faker->streetAddress,
        'cacity' => $faker->randomDigit,
        'castate' => $faker->randomDigit,
        'cazipcode' => $faker->postcode,
    ];
});
