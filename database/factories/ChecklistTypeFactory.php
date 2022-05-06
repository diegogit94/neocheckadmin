<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(3, true),
            'description' => $this->faker->sentence(),
            'is_active' => $this->faker->boolean()
        ];
    }
}
