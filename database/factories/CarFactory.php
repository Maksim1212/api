<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Car::class, function (Faker $faker) {
    return [

        'name' => $faker->word,
        'state' => $faker->word,
        'yearOfissue' => $faker->year($max = 'now'),
        'free' => $faker->word,
        'start_route_at' => $faker->dateTime($max = 'now', $timezone = null),
        'finish_route_at' => $faker->dateTime($max = 'now', $timezone = null),
        'start_repairs_at' => $faker->dateTime($max = 'now', $timezone = null),
        'finish_repairs_at' => $faker->dateTime($max = 'now', $timezone = null),
        'user_id' => function () {

            return App\User::all()->random();
        }

    ];
});
