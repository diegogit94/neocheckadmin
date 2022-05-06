<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * 
     * @var [type]
     */
    protected $model = Merchant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => strtoupper($this->faker->unique()->words(2, true)),
            'identification' => strval($this->faker->unique()->randomNumber(9, true))
        ];
    }
}
