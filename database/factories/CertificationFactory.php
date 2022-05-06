<?php

namespace Database\Factories;

use App\Models\ChecklistType;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Site;
use App\Models\User;

class CertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site' => Site::all()->random(),
            'url' => 'www.' . $this->faker->unique()->domainName(),
            'contact' => $this->faker->unique()->name(),
            'user_id' => User::all()->random(),
            'checklist_type_id' => ChecklistType::all()->random()
        ];
    }
}
