<?php

use Faker\Generator as Faker;

$factory->define(App\Blood::class, function (Faker $faker) {
    return [
        'name' =>'B+',
        'detail'=>'B positive',
        'image'=>'b-pos.png'
    ];
});
