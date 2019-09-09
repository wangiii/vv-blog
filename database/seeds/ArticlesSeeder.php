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
        $tags = App\Models\Tag::all();

        factory(\App\Models\Article::class, 10)->create()->each(function ($article) use($faker, $tags){
            $article->tags()->attach($faker->randomElement($tags));
        });
    }
}
