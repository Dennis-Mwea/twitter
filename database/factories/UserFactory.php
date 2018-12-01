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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->word.rand(1, 73),
        'password' => $password ?: $password = bcrypt('secret'),
        'avatar' => 'https://randomuser.me/api/portraits/'.$faker->randomElement(['men', 'women']).'/'.rand(1, 99).'.jpg',
        'cover' => $faker->imageUrl(800, 220, 'nature'),
        'remember_token' => str_random(10),
    ];
});
