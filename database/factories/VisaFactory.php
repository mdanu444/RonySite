<?php

namespace Database\Factories;

use App\Models\Visa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Visa>
 */
class VisaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'visa_number' => 'VISA' . $this->faker->unique()->numberBetween(100000, 999999),
            'surname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'date_of_birth' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'citizenship' => $this->faker->country(),
            'passport_number' => $this->faker->unique()->numerify('##########'),
            'visa_status' => $this->faker->randomElement(['Active', 'Inactive', 'Pending', 'Expired']),
            'visa_validity' => $this->faker->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
            'visa_type' => $this->faker->randomElement(['Tourist', 'Business', 'Student', 'Work', 'Transit']),
            'visit_purpose' => $this->faker->sentence(5),
            'photo_path' => "images/asdf.jpg",
        ];
    }
}
