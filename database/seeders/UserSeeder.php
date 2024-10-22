<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // To hash the password
use Illuminate\Support\Str; // To generate unique tokens
use App\Models\User; // Assuming User model exists

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a single user
        User::create([
            'name' => 'Ismail Hossain', // Example name
            'email' => 'admin@gmail.com', // Example email
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Hash the password
            'remember_token' => Str::random(10), // Generate random remember token
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
