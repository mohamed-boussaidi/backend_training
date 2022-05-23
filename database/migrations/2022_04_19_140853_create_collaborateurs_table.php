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
        Schema::create('collaborateurs', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('sexe');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('cin');
            $table->timestamp('date_naissance');
            $table->string('adresse');
            $table->string('code_postale');
            $table->string('type_contrat');
            $table->string('fonction');
            $table->timestamp('date_entree')->nullable();
            $table->timestamp('date_sortie')->nullable();
            $table->string('ville');
            $table->string('departement');
            $table->string('password');
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('collaborateurs');
    }
};
