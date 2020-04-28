<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'C_pid' => $faker->randomDigit,
        'C_name' => $faker->unique()->word,
        'C_detail' => $faker->paragraph,
        'C_image' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'C_status' => $faker->randomElement(['1','0']),
        'C_metatitle' => $faker->paragraph,
        'C_metakeyword' => $faker->word,
        'C_metadescription' => $faker->paragraph,
    ];
});
