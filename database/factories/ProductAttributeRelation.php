<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProductAttributeRelation::class, function (Faker $faker) {
    return [
        'parpid' => $faker->randomDigit,
        'paraid' => $faker->randomDigit,
        'parvid' => $faker->randomDigit,
    ];
});
