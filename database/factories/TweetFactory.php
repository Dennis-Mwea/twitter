<?php

use Faker\Generator as Faker;

$factory->define(App\Tweet::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(rand(20, 200)),
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'created_at' => $date = $faker->dateTimeThisMonth,
        'updated_at' => $date,
    ];
});
