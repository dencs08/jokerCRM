<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition()
    {
        return [
            'date' => fake()->date(),
            'location' => fake()->city(),
            'time' => fake()->date('H:i:s', rand(1,54000)),
            'client_id' => fake()->numberBetween($min = 1, $max = 10),
            'system_user_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
