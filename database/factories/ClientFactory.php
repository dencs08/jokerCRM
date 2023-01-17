<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{public $timestamps = false;
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'ceoname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->bothify('###-###-###'),
            'nip' => fake()->randomNumber(6),
            'city' => fake()->word(),
            'zipcode' => fake()->bothify('##-###'),
        ];
    }
}
