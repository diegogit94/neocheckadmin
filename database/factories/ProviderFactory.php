<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->domainWord(),
            'logo' => $this->faker->unique()->imageUrl(),
            'country_id' => Country::all()->random()
        ];
    }
}
