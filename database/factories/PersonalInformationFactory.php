<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PersonalInformation;
use Faker\Generator as Faker;

$factory->define(PersonalInformation::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'name' => $faker->name,
        'gender' => $faker->word,
        'address' => $faker->address,
        'country' => $faker->country,
        'dob' => $faker->dateTimeThisYear,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail
    ];
});
