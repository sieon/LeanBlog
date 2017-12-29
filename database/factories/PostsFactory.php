<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'title'      => $faker->text(),
        'content'    => $faker->text(),
        'excerpt'    => $faker->text(),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
