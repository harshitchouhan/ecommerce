<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\ProductAttributeValues\ProductAttributeValue;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProductAttributeValue::class, function (Faker $faker) {
    return [
        'pavaid' => $faker->randomDigit,
        'pavvalue' => $faker->randomDigit,
        'pavstatus' => $faker->randomElement(['1','0']),
    ];
});
