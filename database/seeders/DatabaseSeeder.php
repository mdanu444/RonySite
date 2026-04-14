<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test users
        User::factory(5)->create();

        // Create a test user
        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => Hash::make('password123'),
            'phone_number' => '+880-1234-567890',
            'date_of_birth' => '1990-01-15',
            'gender' => 'Male',
            'address' => '123 Main Street, City, Country',
            'bio' => 'This is a demo user for testing the system.',
        ]);

        // Run visa seeder
        $this->call(VisaSeeder::class);
    }
}
