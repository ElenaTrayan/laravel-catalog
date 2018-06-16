<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Trademark::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'content' => $faker->text(),
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'count_products' => $faker->numberBetween($min = 0, $max = 5000),
        'supplier_id' => factory('App\Models\Supplier')->create()->id,
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Europe/Kiev'),
    ];
});