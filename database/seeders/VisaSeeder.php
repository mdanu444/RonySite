<?php

namespace Database\Seeders;

use App\Models\Visa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demo visas
        Visa::create([
            'visa_number' => 'DEMO-VISA-001',
            'firstname' => 'Rony',
            'surname' => 'Ahmed',
            'date_of_birth' => '1995-05-20',
            'citizenship' => 'Bangladesh',
            'passport_number' => 'BP12345678',
            'visa_status' => 'Active',
            'visa_validity' => '2025-12-31',
            'visa_type' => 'Tourist',
            'visit_purpose' => 'Tourism and Sightseeing',
            'photo_path' => 'images/asdf.jpg',
        ]);

        Visa::create([
            'visa_number' => 'DEMO-VISA-002',
            'firstname' => 'John',
            'surname' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'citizenship' => 'USA',
            'passport_number' => 'P12345678',
            'visa_status' => 'Active',
            'visa_validity' => '2024-12-31',
            'visa_type' => 'Business',
            'visit_purpose' => 'Business Meeting',
            'photo_path' => 'images/asdf.jpg',
        ]);

        Visa::create([
            'visa_number' => 'DEMO-VISA-003',
            'firstname' => 'Alice',
            'surname' => 'Smith',
            'date_of_birth' => '1992-03-15',
            'citizenship' => 'Canada',
            'passport_number' => 'CA98765432',
            'visa_status' => 'Pending',
            'visa_validity' => '2026-06-30',
            'visa_type' => 'Student',
            'visit_purpose' => 'Higher Education',
            'photo_path' => 'images/asdf.jpg',
        ]);

        Visa::create([
            'visa_number' => 'DEMO-VISA-004',
            'firstname' => 'Maria',
            'surname' => 'Garcia',
            'date_of_birth' => '1988-07-10',
            'citizenship' => 'Spain',
            'passport_number' => 'ES55443322',
            'visa_status' => 'Expired',
            'visa_validity' => '2022-12-31',
            'visa_type' => 'Tourist',
            'visit_purpose' => 'Vacation',
            'photo_path' => 'images/asdf.jpg',
        ]);

        // Create additional visas using factory
        Visa::factory()->count(5)->create();
    }
}
