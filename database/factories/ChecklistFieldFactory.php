<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(4, true),
            'description' => $this->faker->unique()->sentence(),
            'is_active' => $this->faker->boolean()
        ];
    }
}
