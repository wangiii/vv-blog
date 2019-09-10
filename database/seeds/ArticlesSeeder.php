<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $tags = factory(\App\Models\Tag::class, 10)->create();
        factory(\App\Models\Category::class, 5)->create();

        factory(\App\Models\Article::class, 20)->create()->each(function ($article) use($faker, $tags){
            $article->tags()->attach($faker->randomElement($tags));
            $article->tags()->attach($faker->randomElement($tags));
        });
    }
}
