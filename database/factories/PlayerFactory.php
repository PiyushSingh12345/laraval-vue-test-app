<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->title,
        'last_name' => $faker->text(10),
        'team_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
