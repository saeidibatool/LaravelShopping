<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Product;
use App\Brand;
use App\Image;
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
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'brand_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'body' => $faker->text($maxNbChars=150),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'discount' => $faker->numberBetween($min = 1, $max = 90),
        'image'=>$faker->imageUrl($width=500, $height=500, 'sports'),
        'status'=>$faker->numberBetween($min = 0, $max = 1),
    ];
});

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'product_id' => $faker->randomDigitNotNull,
        'address'=>$faker->imageUrl($width=500, $height=500, 'sports'),
    ];
});

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});
