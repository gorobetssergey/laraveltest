<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'slug' => 'administrator',
            ],
            [
                'slug' => 'client'
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}