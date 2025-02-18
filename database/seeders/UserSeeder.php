<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Merchant',
                'email' => 'merchant@gmail.com',
                'role' => 2,
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
