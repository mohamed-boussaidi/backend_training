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
        Schema::create('expense_report', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50)->nullable();
            $table->foreignId('collaborateur_id') ->constrained('collaborateurs') ->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('type_depense_id') ->constrained('type_depense') ->onUpdate('cascade') ->onDelete('cascade');
            $table->float('total_ttc');
            $table->string('client');
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
        Schema::dropIfExists('expense_report');
    }
};
