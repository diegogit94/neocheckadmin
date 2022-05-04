<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_evidence', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('certification_id');
            $table->unsignedBigInteger('evidence_id');

            $table->foreign('certification_id')
                ->references('id')
                ->on('certifications')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('evidence_id')
                ->references('id')
                ->on('evidences')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification_evidence');
    }
}
