<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Car::class, function (Faker $faker) {
    return [

        'name' => $faker->word,
        'condition' => $faker->word,
        'age' => $faker->numberBetween(1,100),
        'free' => $faker->word,
        'start_route_at' => $faker->dateTime($max = 'now', $timezone = null),
        'finish_route_at' => $faker->dateTime($max = 'now', $timezone = null),
        'start_repairs_at' => $faker->dateTime($max = 'now', $timezone = null),
        'finish_repairs_at' => $faker->dateTime($max = 'now', $timezone = null)

    ];
});
