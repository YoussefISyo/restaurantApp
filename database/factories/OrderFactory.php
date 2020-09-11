<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,50),
        'payment'=>$faker->creditCardType,
        'totalprice'=>$faker->numberBetween(100,1000),
        'ordertime'=>now(),
        'address'=>$faker->address
    ];
});
