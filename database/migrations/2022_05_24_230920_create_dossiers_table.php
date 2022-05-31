<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('datenaissance')->nullable();
            $table->string('cni');
            $table->text('antecedent_medicaux')->nullable();
            $table->text('antecedent_chirugicaux')->nullable();
            $table->text('antecedent_familiaux')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('dossiers');
    }
}
