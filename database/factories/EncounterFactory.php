<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EncounterFactory extends Factory
{
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-1 month', '+2 weeks');
        return [
            'date' => $date,
            'theme' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'has_attendance' => $date->format('Y-m-d') <= now()->format('Y-m-d'),
        ];
    }
}
