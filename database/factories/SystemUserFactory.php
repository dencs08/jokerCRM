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
            'password' => 'test', // password
            'role' => fake()->randomElement(['Admin', 'User']),
            'remember_token' => Str::random(10),
        ];
    }
}
