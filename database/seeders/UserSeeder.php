<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Yama",
            'email' => "Yama@gmail.com",
            'password' => Hash::make('Winhacks'),
        ]);

        DB::table('users')->insert([
            'name' => "Walter",
            'email' => "walter@gmail.com",
            'password' => Hash::make('Winhacks'),
        ]);

        DB::table('users')->insert([
            'name' => "Jesse",
            'email' => "jesse@gmail.com",
            'password' => Hash::make('Winhacks'),
        ]);

        DB::table('users')->insert([
            'name' => "Mike",
            'email' => "mike@gmail.com",
            'password' => Hash::make('Winhacks'),
        ]);
    }
}
