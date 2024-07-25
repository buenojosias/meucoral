<?php

namespace Database\Factories;

use App\Enums\WeekDayEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    public function definition(): array
    {
        $min_age = rand(5, 20);
        return [
            'name' => fake()->sentence(3, false),
            'min_age' => $min_age,
            'max_age' => rand($min_age, 70),
            'encounter_weekday' => fake()->randomElement(WeekDayEnum::cases())->value,
            'encounter_time' => fake()->time(),
        ];
    }
}
