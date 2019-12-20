<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        'school_name' => $faker->word,
        'school_do' => $faker->dateTimeThisYear,
        'school_desc' => $faker->paragraph,
        'school_type' => $faker->sentence
    ];
});
