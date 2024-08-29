<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(rand(1, 2), true);

        return [
            'name' => ucfirst($name),
            'slug' => \Str::slug($name),
        ];
    }
}
