<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chorister>
 */
class ChoristerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName() .' '. fake()->lastName,
            'birthdate' => fake()->dateTimeBetween('-30 years', '-8 years'),
            'registration_date' => fake()->dateTimeBetween('-2 months', 'now')
        ];
    }
}
