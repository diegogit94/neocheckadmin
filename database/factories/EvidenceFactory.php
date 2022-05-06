<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
use App\Models\Certification;

class EvidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comments' => $this->faker->unique()->paragraph(),
            'status_id' => Status::all()->random(),
            'certification_id' => Certification::all()->random()
        ];
    }
}
