<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level')->insert([
        	'nama_level' => 'Admin',
        ]);

        DB::table('level')->insert([
        	'nama_level' => 'Kasir',
        ]);

        DB::table('level')->insert([
        	'nama_level' => 'Waiter',
        ]);

        DB::table('level')->insert([
        	'nama_level' => 'Owners',
        ]);

        DB::table('level')->insert([
        	'nama_level' => 'Pelanggan',
        ]);


    }
}
