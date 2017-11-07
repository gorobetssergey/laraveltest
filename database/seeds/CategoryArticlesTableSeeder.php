<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $articles = DB::table('articles')->get();

        $group = [];
        foreach ($articles as $article) {
            for ($i = 1; $i <= $article->id; $i++){
                $group[] = [
                    'article_id' => $article->id,
                    'category_id' => $i
                ];
            }
        }

        DB::table('category_articles')->insert($group);
    }
}