<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'title' => $faker->word,
        'start_date' => $faker->dateTimeThisYear,
        'end_date' => $faker->dateTimeThisYear,
        'status' => $faker->word,
        'file' => $faker->word
    ];
});
