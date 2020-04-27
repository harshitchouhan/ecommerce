<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'B_title' => $faker->unique()->word,
        'B_detail' => $faker->paragraph,
        'B_image' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'B_status' => $faker->randomElement(['1','0']),
    ];
});
