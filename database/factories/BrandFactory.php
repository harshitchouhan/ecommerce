<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Brands\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'Btitle' => $faker->unique()->word,
        'Bdetail' => $faker->paragraph,
        'Bimage' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'Bstatus' => $faker->randomElement(['1','0']),
    ];
});
