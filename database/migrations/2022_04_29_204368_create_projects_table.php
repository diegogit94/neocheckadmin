<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->time('start_date')->nullable();
            $table->time('certification_request_date')->nullable();
            $table->time('certification_start_date')->nullable();
            $table->time('certification_end_date')->nullable();
            $table->time('diners_certification_start_date')->nullable();
            $table->time('diners_certification_end_date')->nullable();
            $table->time('parameters_configuration_date')->nullable();
            $table->time('production_release_date')->nullable();

            $table->string('merchant_number')->nullable();
            $table->boolean('require_pmc');
            $table->unsignedBigInteger('integrator');
            $table->unsignedBigInteger('certifier');
            $table->unsignedBigInteger('leader');
            $table->text('comments')->nullable();
            $table->string('implementation_cost')->nullable();
            $table->string('change_order')->nullable();
            $table->boolean('returned');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('certification_id')->nullable();
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('collection_model_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('programming_language_id')->nullable();
            $table->unsignedBigInteger('commercial_agent_id');
            $table->unsignedBigInteger('site_id')->nullable();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('certification_id')
                ->references('id')
                ->on('certifications')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('merchant_id')
                ->references('id')
                ->on('merchants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('collection_model_id')
                    ->references('id')
                    ->on('collection_models')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('bank_id')
                    ->references('id')
                    ->on('banks')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('programming_language_id')
                    ->references('id')
                    ->on('programming_languages')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('commercial_agent_id')
                    ->references('id')
                    ->on('commercial_agents')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('site_id')
                    ->references('id')
                    ->on('sites')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
