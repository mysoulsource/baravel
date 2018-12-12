<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image'=>'category.jpg',
        'user_id'=>factory('App\User')->create()->id
    ];
});
