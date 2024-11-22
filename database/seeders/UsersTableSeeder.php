<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name'     => 'Admin',
                'username' => 'admin',
                'email'    => 'admin@tidescape.pt',
                'password' =>  Hash::make('123456'),
                'role'     => 'admin',
                'status'   => 'active',
            ],

            // Agent
            [
                'name'     => 'Agent',
                'username' => 'agent',
                'email'    => 'agent@tidescape.pt',
                'password' =>  Hash::make('123456'),
                'role'     => 'agent',
                'status'   => 'active',
            ],

            // User
            [
                'name'     => 'User',
                'username' => 'user',
                'email'    => 'user@tidescape.pt',
                'password' =>  Hash::make('123456'),
                'role'     => 'user',
                'status'   => 'active',
            ],
            
        ]);
    }
}
