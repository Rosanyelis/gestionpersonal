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
        Schema::create('investigacion_depuracion_leyes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('actividad_antisocial', ['Si', 'No']);
            $table->string('resultadop');
            $table->string('detallep')->nullable();
            $table->enum('reporte_actividad_noprocesada', ['Si', 'No']);
            $table->string('resultadoi');
            $table->string('detallei')->nullable();
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
        Schema::dropIfExists('investigacion_depuracion_leyes');
    }
};
