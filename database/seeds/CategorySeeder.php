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
        	'gambar' => 'appetizer.png',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Main Course',
        	'gambar' => 'maincourse.jfif',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Dessert',
        	'gambar' => 'dessert.jfif',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Drinks',
        	'gambar' => 'drinks.jfif',
        ]);
    }
}
