<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salary = $this->faker->numberBetween(30000, 120000);
        return [
            'title' => $this->faker->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => '$' . number_format($salary),
        ];
    }
}
