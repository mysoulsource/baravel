<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'country'=>'Nepal',
        'zone'=>'Bagmati',
        'district'=>'Kathmandu',
        'area'=>'Koteshwor',
        'phone'=>'9843581383',
        'age'=>'25',
        'blood'=>'B+',
        'status'=>'1',
        'info_status'=>'1',
        'img'=>'profile.png',
        'remember_token' => str_random(10),
    ];
});
