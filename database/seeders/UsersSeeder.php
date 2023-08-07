<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'usr_name' => 'Adminnnn',
            'usr_email' => 'adminn@gmail.com',
            'usr_password' => bcrypt('12345'),
        ]);
    }
}