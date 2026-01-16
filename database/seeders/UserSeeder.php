<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'kerencita1224@gmail.com'],
            [
                'name' => 'Yeni Garcia',
                'password' => Hash::make('YGarcia7799'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );
    }
}
