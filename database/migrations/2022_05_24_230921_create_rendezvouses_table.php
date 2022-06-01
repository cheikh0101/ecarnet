<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('created_by');
            $table->string('docteur');
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
        Schema::dropIfExists('rendezvouses');
    }
}
