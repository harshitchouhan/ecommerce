<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Admin\States\State;
use App\Model;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    return [
        'statename' => $faker->unique()->word,
        'statecode' => $faker->randomDigit,
        'stateactive' => $faker->randomElement(['1','0']),
    ];
});
