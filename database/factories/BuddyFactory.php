<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buddy>
 */
class BuddyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'age' => fake()->numberBetween(25, 60),
            'birth_place' => fake()->city(),
            'mother_tongue' => fake()->locale(),
            'birthday' => fake()->dateTimeBetween('-25years', 'now', null)
        ];
    }
}
