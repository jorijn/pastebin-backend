<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Paste::class, function (Faker\Generator $faker) {
    return [
        'content'           => $faker->text(),
        'language_id'       => 1,
        'ip'                => $faker->ipv4,
    ];
});
