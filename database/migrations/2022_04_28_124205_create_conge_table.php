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
        Schema::create('conge', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50)->nullable();
            $table->foreignId('collaborateur_id') ->constrained('collaborateurs') ->onUpdate('cascade') ->onDelete('cascade');
            $table->timestamp('date_debut')->nullable();
            $table->timestamp('date_fin')->nullable();
            $table->integer('nbr_jrs');
            $table->string('type_conge');
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
        Schema::dropIfExists('conge');
    }
};
