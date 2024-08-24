<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = '+1 month'),
            'time' => $this->faker->randomElement([null, $this->faker->time($format = 'H:i')]),
            'manager_description' => $this->faker->text,
            'is_presentation' => $this->faker->boolean,
        ];
    }
}
