<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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
             'email' => 'iusmanuae@gmail.com',
             'password' => bcrypt('Pass@321321'),
             'name' => 'Admin',
             'role' => 'admin',
             'status' => 'active'
         ]);
    }
}
