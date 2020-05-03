<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Customers\Customer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'cname' => $faker->unique()->word,
        'cemail' => $faker->email,
        'cimage' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'caddressline1' => $faker->streetAddress,
        'caddressline2' => $faker->streetAddress,
        'ccity' => $faker->randomDigit,
        'cstate' => $faker->randomDigit,
        'czipcode' => $faker->postcode,
        'cgoogleid' => $faker->email,
        'cfaceboookid' => $faker->email,
        'clinkedinid' => $faker->email,
        'cstatus' => $faker->randomElement(['1','0']),
        'cphone' => $faker->e164PhoneNumber,
        'calternatephone' => $faker->e164PhoneNumber,
    ];
});
