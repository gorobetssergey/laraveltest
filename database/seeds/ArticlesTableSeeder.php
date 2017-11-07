<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Article::class, 10)->create();
    }
}