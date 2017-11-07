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

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'user_id' => mt_rand(1,50),
        'image' => '//placeimg.com/300/260/people?random=',
        'content' => $faker->text(500),
    ];
});
