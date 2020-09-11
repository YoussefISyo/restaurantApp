<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderContent;
use Faker\Generator as Faker;

$factory->define(OrderContent::class, function (Faker $faker) {
    return [
        'order_id'=>$faker->numberBetween(1,75),
        'meal_id'=>$faker->numberBetween(1,50),
        'quantity'=>$faker->numberBetween(1,10)
    ];
});
