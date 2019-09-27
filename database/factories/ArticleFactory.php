<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'category_id' =>  \App\Models\Category::all()->random()->id,
        'title' => $faker->unique()->text(15),
        'content' =>  $faker->realText(),
        'description' => $faker->text(30),
        'is_draft' => 0,
        'published_at' => \Carbon\Carbon::now(),
    ];
});
