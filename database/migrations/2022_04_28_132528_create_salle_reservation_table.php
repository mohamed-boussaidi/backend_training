<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salle_reservation', function (Blueprint $table) {
            $table->id();
            $table->string('demandateur');
            $table->foreignId('collaborateur_id') ->constrained('collaborateurs') ->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('salle_id') ->constrained('salle') ->onUpdate('cascade') ->onDelete('cascade');
            $table->string('hour_start');
            $table->string('hour_end');
            $table->string('date_reunion');
            $table->string('nbr_participant');
            $table->string('material_dispo');
            $table->string('name_event');
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
        Schema::dropIfExists('salle_reservation');
    }
};
