<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Categories\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'Cpid' => $faker->randomDigit,
        'Cname' => $faker->unique()->word,
        'Cdetail' => $faker->paragraph,
        'Cimage' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'Cstatus' => $faker->randomElement(['1','0']),
        'Cmetatitle' => $faker->paragraph,
        'Cmetakeyword' => $faker->word,
        'Cmetadescription' => $faker->paragraph,
    ];
});
