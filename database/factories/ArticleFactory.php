<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Article;
use App\Models\Category;
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

$factory->define(Article::class, function (Faker $faker) {
    $categorys = Category::all();
    return [
        'title' => $faker->sentence,
        'describe' => $faker->sentence,
        'content' => $faker->paragraph,
        'category_id' => $faker->randomElement($categorys)->id,
    ];
});
