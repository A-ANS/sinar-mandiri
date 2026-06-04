<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin user
        User::create([
            'name' => 'Admin Sinar Mandiri',
            'email' => 'sinarmandiri@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Buat pembeli user
        User::create([
            'name' => 'Najwa Nagita',
            'email' => 'najwangt54@gmail.com',
            'password' => Hash::make('cikalong1973'),
            'role' => 'pembeli',
        ]);

        // Seed cars
        $this->call(CarSeeder::class);
    }
}