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
            $table->foreignId('collaborateur_id') ->constrained('collaborateurs') ->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('salle_id') ->constrained('salle') ->onUpdate('cascade') ->onDelete('cascade');
            $table->timestamp('hour_start')->nullable();
            $table->timestamp('hour_end')->nullable();
            $table->timestamp('date_reunion')->nullable();
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
