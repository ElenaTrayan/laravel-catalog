<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Discount::class, function (Faker $faker) {
    return [
        'percent_discount' => $faker->randomElement($array = array (0,2,0,3,0,5,0,7,0,10,0,12,0,15,0,17,0,20,0,25,0,35,0,45,0,50,0,55,0,60,0,65,0,70,0)),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Europe/Kiev'),
    ];
});
