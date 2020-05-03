<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProductAttributeRelation::class, function (Faker $faker) {
    return [
        'parpId' => $faker->randomDigit,
        'paraId' => $faker->randomDigit,
    ];
});
