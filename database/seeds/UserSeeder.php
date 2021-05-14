<?php

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'phone' => '000',
                'role' => 'admin',
                'password' => 'admin'
            ],[
                'id' => 2,
                'name' => 'user1',
                'email' => 'user1@user.com',
                'phone' => '111',
                'role' => 'user',
                'password' => 'user'
            ]
        ]);
    }
}
