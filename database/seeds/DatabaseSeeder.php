<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                 DB::table('users')->insert([
        	'name' => 'hmif',
        	'email' => 'hmif@gmail.com',
            'password' => bcrypt('hmif2020'),
            'role' =>'admin'
        	
        ]);
    }
}
