<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'tweet_id' => function () {
            return App\Tweet::inRandomOrder()->first()->id;
        },
        'created_at' => $date = $faker->dateTimeThisMonth,
        'updated_at' => $date,
    ];
});
