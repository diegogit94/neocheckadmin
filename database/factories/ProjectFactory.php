<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Certification;
use App\Models\Merchant;
use App\Models\Provider;
use App\Models\Country;
use App\Models\CollectionModel;
use App\Models\Bank;
use App\Models\ProgrammingLanguage;
use App\Models\CommercialAgent;
use App\Models\Site;
use Carbon\Carbon;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $startDate = Carbon::now()->addDays(rand(1, 200));
        $certificationRequestDate = $startDate->addDays(rand(1, 10));
        $certificationStartDate = $certificationRequestDate->addDays(rand(1, 3));
        $certificationEndDate = $certificationStartDate->addDays(rand(5, 30));
        $dinersCertificationStartDate = $startDate->addDays(rand(1, 10));
        $dinersCertificationEndtDate = $dinersCertificationStartDate->addDays(rand(1, 5));
        $parametersConfigurationDate = $startDate->addDays(rand(1, 10));
        $productionReleaseDate = $certificationEndDate->addDays(rand(1, 5));
        
        return [
            'start_date' => strval($startDate),
            'certification_request_date' => strval($certificationRequestDate),
            'certification_start_date' => strval($certificationStartDate),
            'certification_end_date' => strval($certificationEndDate),
            'diners_certification_start_date' => strval($dinersCertificationStartDate),
            'diners_certification_end_date' => strval($dinersCertificationEndtDate),
            'parameters_configuration_date' => strval($parametersConfigurationDate),
            'production_release_date' => strval($productionReleaseDate),

            'merchant_number' => strval($this->faker->unique()->randomNumber(6, true)),
            'require_pmc' => $this->faker->boolean(),
            'integrator'=> User::all()->random(),
            'certifier' => User::all()->random(),
            'leader' => User::all()->random(),
            'comments' => $this->faker->sentence(),
            'implementation_cost' => '$' . strval($this->faker->randomNumber(8)),
            'change_order' => strval($this->faker->unique()->randomNumber(5, true)),
            'returned' => false,

            'user_id' => User::all()->random(),
            'certification_id' => Certification::all()->random(),
            'merchant_id' => Merchant::all()->random(),
            'provider_id' => Provider::all()->random(),
            'country_id' => Country::all()->random(),
            'collection_model_id' => CollectionModel::all()->random(),
            'bank_id' => Bank::all()->random(),
            'programming_language_id' => ProgrammingLanguage::all()->random(),
            'commercial_agent_id' => CommercialAgent::all()->random(),
            'site_id' => Site::all()->random(),
        ];
    }
}
