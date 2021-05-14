<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'testing',
                'description' => 'testing',
                'image' => 'test.png'
            ],[
                'user_id' => 2,
                'category_id' => 2,
                'title' => 'testing 2',
                'description' => 'testing 2',
                'image' => 'test.png'
            ]
        ]);
    }
}
