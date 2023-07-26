<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     UserAddressFactory.php
 * @LastModified 2/20/19 10:14 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

use App\Models\Subdistricts;
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

$factory->define(App\Models\Auth\UserAddress::class, function (Faker $faker) {

    $subdistrict = Subdistricts::first();

    return [
        'user_id'        => function () {
            return factory(\App\Models\Auth\User::class)->create()->id;
        },
        'address'        => $this->faker->address,
        'subdistrict_id' => $subdistrict->id,
        'province'       => $subdistrict->province->name,
        'postal_code'    => $subdistrict->postal_code,
    ];
});
