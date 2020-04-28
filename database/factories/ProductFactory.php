<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'p_code' => $faker->randomDigit,
        'p_brandid' => $faker->randomDigit,
        'p_categoryid' => $faker->randomDigit,
        'p_name' => $faker->unique()->word,
        'p_description' => $faker->paragraph,
        'p_wholesaleprice' => $faker->numberBetween($min = 100, $max = 50000),
        'p_retailprice' => $faker->numberBetween($min = 100, $max = 50000),
        'p_saleprice' => $faker->numberBetween($min = 100, $max = 50000),
        'p_status' => $faker->randomElement(['1','0']),
        'p_image1' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'p_image2' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'p_image3' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'p_image4' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'p_image5' => $faker->randomElement(['img-1.jpg', 'img-2.jpg', 'img-3.jpg', 'img-4.jpg', 'img-5.jpg']),
        'p_video' => $faker->randomElement(['video-1.mp4', 'video-2.mp4']),
        'p_metatitle' => $faker->paragraph,
        'p_metakeyword' => $faker->word,
        'p_metadescription' => $faker->paragraph,
        'p_relatedProducts' => $faker->randomDigit,
    ];
});
