<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Doctors;
use Faker\Generator as Faker;

$factory->define(Doctors::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'address' => $faker->word,
        'city' => $faker->word,
        'state' => $faker->word,
        'cep' => $faker->word,
        'long' => $faker->word,
        'lat' => $faker->word,
        'specialty_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
