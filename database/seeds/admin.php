<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Use Hash::make to hash the password
            'role' => 'admin', // Default role as admin
        ]);
    }
}
