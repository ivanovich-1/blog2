<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name_user' => $faker->name,
        'comment' => $faker->paragraph(1),
        'created_at' => $faker->dateTimeThisMonth,
        'post_id' => $faker->numberBetween(1,50)
    ];
});
