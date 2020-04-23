<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
		    'name' => 'Jino Lacson',
		    'email' => 'jino.lacson@boom.camp',
		    'password' => Hash::make('Boom12345')
		]);
    }
}
