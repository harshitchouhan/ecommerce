<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Sellers\Seller;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'sname' => $faker->unique()->word,
        'semail' => $faker->email,
        'simage' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'saddressline1' => $faker->streetAddress,
        'saddressline2' => $faker->streetAddress,
        'scity' => $faker->randomDigit,
        'sstate' => $faker->randomDigit,
        'szipcode' => $faker->postcode,
        'sgoogleid' => $faker->email,
        'sfaceboookid' => $faker->email,
        'slinkedinid' => $faker->email,
        'sstatus' => $faker->randomElement(['1','0']),
        'sphone' => $faker->e164PhoneNumber,
        'salternatephone' => $faker->e164PhoneNumber,
    ];
});
