<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'level_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
        	'level_id' => 2,
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir'),
        ]);
        DB::table('users')->insert([
        	'level_id' => 3,
            'name' => 'Waiter',
            'email' => 'Waiter@gmail.com',
            'password' => Hash::make('waiter'),
        ]);
        DB::table('users')->insert([
        	'level_id' => 4,
            'name' => 'Owner',
            'email' => 'Owner@gmail.com',
            'password' => Hash::make('owner'),
        ]);
        DB::table('users')->insert([
        	'level_id' => 5,
            'name' => 'Udeean',
            'email' => 'Udeean@gmail.com',
            'password' => Hash::make('farit142'),
        ]);
    }
}
