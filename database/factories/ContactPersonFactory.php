<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactPersonFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->bothify('###-###-###'),
            'client_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
