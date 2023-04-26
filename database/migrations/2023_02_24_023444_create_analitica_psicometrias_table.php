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
        Schema::create('analitica_psicometrias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('prueba_psicometrica', ['Si', 'No']);
            $table->string('resultadop');
            $table->string('detallep')->nullable();
            $table->enum('enfermedades_contagiosas', ['Si', 'No']);
            $table->string('resultadoi');
            $table->string('detallei')->nullable();
            $table->enum('consumo_alcohol', ['Si', 'No']);
            $table->string('resultadoa');
            $table->string('detallea')->nullable();
            $table->enum('sustancia_prohibida', ['Si', 'No']);
            $table->string('resultados');
            $table->string('detalles')->nullable();
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
        Schema::dropIfExists('analitica_psicometrias');
    }
};
