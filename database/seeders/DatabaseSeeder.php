<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
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

        // Buat 5 user tambahan
        \App\Models\User::factory(5)->create();

        // Seed cars
        $this->call(CarSeeder::class);
    }
}
