<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Tuna Melt',
            'gambar' => 'tuna-melt.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Super Suprime Chicken',
            'gambar' => 'super-supreme-chicken.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Pizza Black Pepper',
            'gambar' => 'blackpepper.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Black Meat Monsta',
            'gambar' => 'black-meat-monsta.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Cheese lover',
            'gambar' => 'cheese-lovers.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Meat Lover',
            'gambar' => 'meat-lovers.png'
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Black Pepper Chicken',
            'gambar' => 'black-pepper-chicken.png',
            'jenis' => 'Nasi',
            'harga' => 43000
        ]);

        DB::table('products')->insert([
        	'category_id' => 2,
        	'nama' => 'Oriental Chicken',
            'gambar' => 'oriental-chicken.png',
            'jenis' => 'Nasi',
            'harga' => 43000
        ]);

        DB::table('products')->insert([
        	'category_id' => 3,
        	'nama' => 'Beef Lasagna',
            'gambar' => 'beef-lasagna.png',
            'jenis' => 'Pasta',
            'harga' => 57000
        ]);

        DB::table('products')->insert([
        	'category_id' => 3,
        	'nama' => 'Chiken Cannelloni',
            'gambar' => 'chicken-cannelloni.png',
            'jenis' => 'Pasta',
            'harga' => 57000
        ]);

        DB::table('products')->insert([
        	'category_id' => 3,
        	'nama' => 'Creamy Beef',
            'gambar' => 'creamy-beef.png',
            'jenis' => 'Pasta',
            'harga' => 57000
        ]);

        DB::table('products')->insert([
        	'category_id' => 3,
        	'nama' => 'Fresh Salad Buah',
            'gambar' => 'fresh-salad-buah.png',
            'jenis' => 'Salad',
            'harga' => 41000
        ]);

        DB::table('products')->insert([
        	'category_id' => 1,
        	'nama' => 'Baked Chicken Chunks',
            'gambar' => 'baked-chicken-chunks.png',
            'jenis' => 'Chicken Roll',
            'harga' => 40000
        ]);

        DB::table('products')->insert([
        	'category_id' => 1,
        	'nama' => 'Deluxe Tuna Bruschetta',
            'gambar' => 'deluxe-tuna-bruschetta.png',
            'jenis' => 'Bread',
            'harga' => 27000
        ]);

        DB::table('products')->insert([
        	'category_id' => 1,
        	'nama' => 'Garlic Bread',
            'gambar' => 'Garlic-Bread.png',
            'jenis' => 'Bread',
            'harga' => 23000
        ]);

        DB::table('products')->insert([
        	'category_id' => 4,
        	'nama' => 'Mixberry Lime',
            'gambar' => 'mixberry.jpg',
            'jenis' => 'Berry Lime',
            'harga' => 31000
        ]);

        DB::table('products')->insert([
        	'category_id' => 4,
        	'nama' => 'Watermellon Lime juice',
            'gambar' => 'watermelon-lime.jpg',
            'jenis' => 'Berry tea',
            'harga' => 31000
        ]);


    }
}
