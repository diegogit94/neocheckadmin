<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeZone;
use App\Models\Country;
use App\Models\ModelHasRole;
use App\Models\User;
use Database\Factories\ModelHasRoleFactory;

// use App\Models\Provider;
// use App\Models\Collection;
// use App\Models\Bank;
// use App\Models\Certification;
// use App\Models\Site;
// use App\Models\ProgrammingLanguage;
// use App\Models\CommercialAgent;
// use App\Models\Merchant;
// use App\Models\ChecklistField;
// use App\Models\ChecklistType;
// use App\Models\Status;
// use App\Models\Evidence;
// use App\Models\Image;
// use App\Models\Project;
// use App\Models\Currency;
// use App\Models\PaymentMethod;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TimeZone::factory(50)->create();
        Country::factory(50)->create();
        User::factory()->create(['name' => 'Mr Hyde', 'email' => 'mrhyde@admin.com']);
        User::factory(99)->create();
        $this->call(RolePermissionSeeder::class);
        // Provider::factory(20)->create();
        // Collection::factory(2)->create();
        // Bank::factory(50)->create();
        // Site::factory(300)->create();
        // ProgrammingLanguage::factory(7)->create();
        // CommercialAgent::factory(10)->create();
        // Merchant::factory(80)->create();
        // ChecklistField::factory(200)->create();
        // ChecklistType::factory(7)->create();
        // Status::factory(3)->create();
        // Certification::factory(300)->create(); // Check the relationship between the factories and models
        // Evidence::factory(600)->create();
        // Image::factory(800)->create();
        // Project::factory(300)->create();
        // Currency::factory(20)->create();
        // PaymentMethod::factory(6)->create();
    }
}
