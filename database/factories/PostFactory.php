<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence('1'),
        'content'=>$faker->sentence('1'),
        'category_id'=>factory('App\Category')->create()->id,
        'tags'=>$faker->word(),
        'slug'=>$faker->word(),
        'user_id'=>factory('App\User')->create()->id,
    ];
});
