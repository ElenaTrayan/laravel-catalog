<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Supplier::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text(),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Europe/Kiev'),
    ];
});