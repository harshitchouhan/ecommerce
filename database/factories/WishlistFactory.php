<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Wishlist\Wishlist;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Wishlist::class, function (Faker $faker) {
    return [
        'wcid' => $faker->randomDigit,
        'wpid' => $faker->randomDigit,
    ];
});
