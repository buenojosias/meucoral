<?php

namespace Database\Factories;

use App\Enums\AgeGroupEnum;
use App\Enums\ChoirCategoryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoirFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Coral ' . fake()->company(),
            'age_group' => fake()->randomElement(AgeGroupEnum::cases())->value,
            'category' => fake()->randomElement(ChoirCategoryEnum::cases())->value,
            'total_choristers' => rand(1, 30),
            'active' => fake()->boolean(),
            'visible' => fake()->boolean(),
        ];
    }
}
