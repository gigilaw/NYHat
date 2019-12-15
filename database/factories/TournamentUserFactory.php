<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TournamentUser;
use App\Models\User;
use App\Models\Payment;
use Faker\Generator as Faker;

$factory->define(TournamentUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique(true)->randomElement(User::pluck('id', 'id')->toArray()),
        'tournament_id' => 1,
    ];
});
