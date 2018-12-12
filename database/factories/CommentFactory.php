<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id'=>$faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        'user_id'=>factory('App\User')->create()->id,
        'content'=>$faker->sentence(2)
    ];
});
