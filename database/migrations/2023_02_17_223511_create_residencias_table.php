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
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('distrito_municipal')->nullable();
            $table->string('seccion')->nullable();
            $table->string('paraje')->nullable();
            $table->string('sector')->nullable();
            $table->string('barrio')->nullable();
            $table->string('tipo_residencia')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('coordenada')->nullable();
            $table->string('referencia_llegada')->nullable();
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
        Schema::dropIfExists('residencias');
    }
};
