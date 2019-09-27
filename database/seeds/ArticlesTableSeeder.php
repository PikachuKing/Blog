<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = factory(\App\Models\Article::class, 30)->create()->each(function ($article) {
            $article->tags()->save(\App\Models\Tag::all()->random());
        });
    }
}
