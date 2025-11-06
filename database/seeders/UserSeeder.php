<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin TechVente',
            'email' => 'admin@techvente.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Seller One',
            'email' => 'seller1@techvente.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
        ]);

        User::create([
            'name' => 'Seller Two',
            'email' => 'seller2@techvente.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
        ]);
    }
}
