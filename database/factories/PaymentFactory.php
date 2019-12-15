<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(Payment::$status),
        'reference_code' => Str::random(4),
        'form_of_payment' => $faker->randomElement(Payment::$formOfPayment),
        'paid_at' => $faker->date('Y-m-d', 'now'),
    ];
});
