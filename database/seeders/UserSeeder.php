<?php

namespace Database\Seeders;

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
        // Create a new user.
        DB::table('users')->insert([
            'name' => 'Invité',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('Bi1venu€'),
        ]);
    }
}
