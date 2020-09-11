<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name'=>$faker->title,
        'photo'=>$faker->imageUrl(),
        'price'=>$faker->numberBetween(100,1000),
        'category_id'=>$faker->numberBetween(1,15),
        'ingrediants'=>$faker->sentence(10)
    ];
});
