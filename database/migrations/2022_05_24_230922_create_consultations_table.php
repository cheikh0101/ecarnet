<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('symptomes');
            $table->text('medicament_prescrits')->nullable();
            $table->text('historique_maladie')->nullable();
            $table->text('tension_arterielle')->nullable();
            $table->text('temperature')->nullable();
            $table->text('pouls')->nullable();
            $table->text('frequence_respiratoire')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
