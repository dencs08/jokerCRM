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
            'city' => fake()->city(),
            'zipcode' => fake()->bothify('##-###'),
            // 'contact_person_id' => fake()->numberBetween($min = 1, $max = 100),
            // 'contract_id' => fake()->numberBetween($min = 1, $max = 100),
        ];
    }
}
