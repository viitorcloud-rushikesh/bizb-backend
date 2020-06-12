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
    $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'mobile' => $faker->phoneNumber,
        'email_verified_at' => now(),
        'mobile_verified_at' => now(),
        'password' => bcrypt('secret'),
        'timezone' => $faker->timezone,
        'last_login_at' => $faker->dateTime,
        'last_login_ip' => $faker->ipv4,
        'remember_token' => Str::random(10)
    ];
});
