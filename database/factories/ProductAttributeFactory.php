<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\ProductAttribute\ProductAttribute;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProductAttribute::class, function (Faker $faker) {
    return [
        'PAname' => $faker->randomDigit,
        'PAvalue' => $faker->randomDigit,
        'PAdetail' => $faker->paragraph,
        'PAfilter' => $faker->randomDigit,
        'PAstatus' => $faker->randomElement(['1','0']),
        'PAimage' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg']),
        'PAcategory' => $faker->randomDigit,
    ];
});
