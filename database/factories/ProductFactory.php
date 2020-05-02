<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\Products\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'Pcode' => $faker->randomDigit,
        'Pbrandid' => $faker->numberBetween($min = 1, $max = 10),
        'Pcategoryid' => $faker->numberBetween($min = 1, $max = 10),
        'Pname' => $faker->unique()->word,
        'Pdescription' => $faker->paragraph,
        'PsellerId' => $faker->randomDigit,
        'Pwholesaleprice' => $faker->numberBetween($min = 100, $max = 50000),
        'Pretailprice' => $faker->numberBetween($min = 100, $max = 50000),
        'Psaleprice' => $faker->numberBetween($min = 100, $max = 50000),
        'Pstatus' => $faker->randomElement(['1','0']),
        'Pimage1' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'Pimage2' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'Pimage3' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'Pimage4' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'Pimage5' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'Pvideo' => $faker->randomElement(['video-1.mp4', 'video-2.mp4']),
        'Pmetatitle' => $faker->paragraph,
        'Pmetakeyword' => $faker->word,
        'Pmetadescription' => $faker->paragraph,
        'PrelatedProducts' => $faker->randomDigit,
    ];
});
