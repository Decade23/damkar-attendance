<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\Auth\User::class, function (Faker $faker) {
    return [
        'name'     => $faker->unique()->name,
        'email'    => $faker->unique()->safeEmail,
        'phone'    => '08889119'. $faker->numberBetween(10, 1200),
        'password' => bcrypt("12345678"),
        'type'     => 'customer'
    ];
});
