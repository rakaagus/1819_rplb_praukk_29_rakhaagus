<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
        	'nama' => 'Appetizer',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Main Course',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Dessert',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Drinks',
        ]);
    }
}
