<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buy;
use Faker\Generator as Faker;

$factory->define(Buy::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'product_id' => $faker->numberBetween(1, 100)
    ];
});
