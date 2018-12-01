<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'bio' => $faker->realText(rand(100, 200)),
        'designation' => $faker->jobTitle,
        'company' => $faker->company,
        'city' => $faker->city,
        'country' => $faker->country,
        'dob' => $faker->date(),
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
