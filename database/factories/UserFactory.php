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
        'name'                  => $faker->name,
        'email'                 => $faker->unique()->safeEmail,
        'password'              => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar'                =>'/images/default.png',
        'comfirmation_token'    => str_random(40),
        'is_active'             => 0,
        'questions_count'       => 0,
        'answers_count'         => 0,
        'comments_count'        => 0,
        'favorites_count'       => 0,
        'likes_count'           => 0,
        'followers_count'       => 0,
        'followings_count'      => 0,
        'remember_token'        => str_random(10),
    ];
});
