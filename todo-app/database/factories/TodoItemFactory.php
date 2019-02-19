<?php

use Faker\Generator as Faker;

$factory->define(App\TodoItem::class, function (Faker $faker) {
    $user_id = App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_id),
        'name' => $faker->text(40),
        'description' => $faker->realText(200),
        'complete-by' => $faker->date('Y-m-d')
    ];
});
