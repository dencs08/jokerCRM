<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SystemUserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->bothify('###-###-###'),
            'password' => 'test', // password
            'role' => fake()->randomElement(['Admin', 'User']),
            'department' => fake()->city(),
            'percentage' => fake()->numberBetween($min = 5, $max = 15),
            'remember_token' => Str::random(10),
        ];
    }
}
