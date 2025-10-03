<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test admin user
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'profile' => 'SystemUser',
            'profile_id' => 1,
            'status_id' => 1,
        ]);

        // Create a test regular user
        User::create([
            'username' => 'user',
            'password' => Hash::make('password'),
            'profile' => 'RegularUser',
            'profile_id' => 2,
            'status_id' => 1,
        ]);
    }
}


