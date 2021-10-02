<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(1, 5),
        'title' => $faker->title,
        'text' => $faker->text,
    ];
});
