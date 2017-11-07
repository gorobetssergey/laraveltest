<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(UserRoleTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(CategoryArticlesTableSeeder::class);
    }
}