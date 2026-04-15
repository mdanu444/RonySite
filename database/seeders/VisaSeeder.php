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
            'visa_number' => 'VZPCKXS3PS7A21',
            'firstname' => 'PROSHANTA CHANDRA',
            'surname' => 'DAS',
            'date_of_birth' => '2001-09-14',
            'citizenship' => 'Bangladesh',
            'passport_number' => 'A05239059',
            'visa_status' => 'Issued Visa',
            'visa_validity' => '2026-08-17',
            'visa_type' => 'C-T',
            'visit_purpose' => 'Employment',
            'photo_path' => 'images/asdf.jpg',
        ]);

        // Create additional visas using factory
        // Visa::factory()->count(1)->create();
    }
}
