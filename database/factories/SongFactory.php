<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->randomElement([null, $this->faker->name]),
            'highlighted' => $this->faker->boolean,
            'shared' => $this->faker->boolean,
        ];
    }
}
