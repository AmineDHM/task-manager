<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $name = $faker->sentence(2);
    return [
        'name' => $name,
        'description' => $faker->sentence(6),
        'user_id' => 1
    ];
});
