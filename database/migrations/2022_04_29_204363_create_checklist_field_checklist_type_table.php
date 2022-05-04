<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistFieldChecklistTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_field_checklist_type', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('checklist_field_id');
            $table->unsignedBigInteger('checklist_type_id');

            $table->foreign('checklist_field_id')
                ->references('id')
                ->on('checklist_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('checklist_type_id')
                ->references('id')
                ->on('checklist_types')
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
        Schema::dropIfExists('checklist_field_checklist_type');
    }
}
