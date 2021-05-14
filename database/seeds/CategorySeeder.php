<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    public function run() {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Mountains'
            ],[
                'id' => 2,
                'name' => 'Beach'
            ]
        ]);
    }
}
