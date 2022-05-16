<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['VISA', 'MASTERCARD', 'AMERICAN EXPRESS', 'DINERS', 'PSE', 'EFECTIVO']),
            'code' => strtoupper($this->faker->unique()->word())
        ];
    }
}
