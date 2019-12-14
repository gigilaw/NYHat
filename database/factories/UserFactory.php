<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'position' => $faker->randomElement(User::$position),
        'throwing' => $faker->numberBetween(1, 5),
        'catching' => $faker->numberBetween(1, 5),
        'speed' => $faker->numberBetween(1, 5),
        'offense' => $faker->numberBetween(1, 5),
        'defense' => $faker->numberBetween(1, 5),
        'nick_name' => $faker->name,
        'age' => $faker->randomNumber(2),
        'height' => $faker->numberBetween(150, 200),
        'gender' => $faker->randomElement(User::$gender),
    ];
});
