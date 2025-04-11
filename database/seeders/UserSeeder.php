<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Koks77',
            'email' => 'admin@coolcoffee.discount',
            'password' => Hash::make('77788399'),
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@coolcoffee.discount',
            'password' => Hash::make('password123'),
        ]);
    }
} 