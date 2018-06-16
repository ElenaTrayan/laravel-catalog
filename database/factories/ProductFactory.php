<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'trademark_id' => factory('App\Models\Trademark')->create()->id,
        'page_id' => $faker->numberBetween($min = 11, $max = 51),
        'code' => $faker->unique()->numberBetween($min = 1000, $max = 11000),
        'title' => $faker->sentence(10),
        'alias' => $faker->unique()->md5,
        'is_published' =>  $faker->numberBetween($min = 1, $max = 1),
        'introtext' => $faker->sentence(20),
        'content' => $faker->text(),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'old_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'state' =>  $faker->numberBetween($min = 1, $max = 1),
        'minimal' =>  $faker->numberBetween($min = 1, $max = 1),
        'package' =>  $faker->randomElement($array = array (6,12,24,48,60)),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'image_alt' => $faker->sentence(5),
        'discount_id' => factory('App\Models\Discount')->create()->id,
        'discount_uah' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5000),
        'meta_title' => $faker->sentence(10),
        'meta_desc' => $faker->sentence(15),
        'meta_key' => $faker->sentence(5),
        'new' => $faker->numberBetween($min = 0, $max = 1),
        'action' => $faker->numberBetween($min = 0, $max = 1),
//        'start_activity' => $faker->,
//        'end_activity' => $faker->,
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'count' => $faker->numberBetween($min = 0, $max = 500),
        'barcode' => $faker->regexify('[0-9A-Z-]+\-[A-Z]{2,4}'),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Europe/Kiev'),
        'published_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Europe/Kiev'),
    ];
});
