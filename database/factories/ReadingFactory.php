<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reading;
use Faker\Generator as Faker;

$factory->define(Reading::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'title' => $faker->word,
        'doi' => $faker->randomNumber(),
        'year' => $faker->randomNumber(),
        'type' => $faker->word
    ];
});
