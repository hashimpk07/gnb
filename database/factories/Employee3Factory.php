<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Employee3Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'department' => $this->faker->randomElement(['HR', 'IT', 'Sales', 'Marketing']),
            'job_title' => $this->faker->jobTitle(),
            'email' => $this->faker->unique()->safeEmail(),
            'hire_date' => $this->faker->date(),
            'salary' => $this->faker->numberBetween(50000, 150000),
            'location' => $this->faker->randomElement(['New York', 'San Francisco', 'Remote']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'performance_rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
