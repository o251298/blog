<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'post_id' => $faker->unique->numberBetween(0, 31),
        'url' => $faker->imageUrl,
    ];
});
