<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    public function run()
    {
        $users = DB::table('users')->get();
        $user_roles = [];
        foreach ($users as $user) {
            $user_roles[] = [
                'user_id' => $user->id,
                'role_id' => mt_rand(1,2),
            ];
        }
        DB::table('user_roles')->insert($user_roles);
    }
}