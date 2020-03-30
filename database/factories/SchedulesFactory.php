<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Schedules;
use Faker\Generator as Faker;

$factory->define(Schedules::class, function (Faker $faker) {

    return [
        'consultation_date' => $faker->date('Y-m-d H:i:s'),
        'patients_id' => $faker->randomDigitNotNull,
        'doctors_id' => $faker->randomDigitNotNull,
        'descriptions' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
