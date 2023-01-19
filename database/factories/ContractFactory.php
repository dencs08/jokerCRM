<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    public function definition()
    {
        return [
            'transactionID' => fake()->bothify('FV####-##-##'),
            'commision' => fake()->numberBetween($min = 150, $max = 600),
            'price' => fake()->numberBetween($min = 1500, $max = 6000),
            'netamount' => fake()->numberBetween($min = 1500, $max = 6000),
            'status' => fake()->randomElement(['Completed', 'Pending', 'Canceled']),
            'client_id' => fake()->numberBetween($min = 1, $max = 10),
            'system_user_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
