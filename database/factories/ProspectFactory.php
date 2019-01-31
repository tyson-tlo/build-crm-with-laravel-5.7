<?php

use App\Prospect;
use Faker\Generator as Faker;

$factory->define(Prospect::class, function (Faker $faker) {
    return [
        'created_by' => 1,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'phone_2' => $faker->tollFreePhoneNumber,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'province_state' => $faker->state,
        'country' => $faker->country,
        'note' => $faker->text($maxNbChars = 250),
        'isClient' => false,
        'isClaimable' => true,
        'assigned' => 1,
        'date_assigned' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
