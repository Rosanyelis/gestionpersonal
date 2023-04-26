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
        Schema::create('datos_laborals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->nullable()->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('estatus_laboral')->nullable();
            $table->enum('disponibilidad', ['Mañana', 'Tarde', 'Noche', 'Madrugada'])->nullable();
            $table->string('rango_hora')->nullable();
            $table->integer('cantidad_hora')->nullable();
            $table->string('nombre_labor')->nullable();
            $table->string('empresa')->nullable();
            $table->string('jefe_inmediato')->nullable();
            $table->string('telefono')->nullable();
            $table->string('anos')->nullable();
            $table->string('empresa_old')->nullable();
            $table->string('jefe_inmediato_old')->nullable();
            $table->string('telefono_old')->nullable();
            $table->string('anos_old')->nullable();
            $table->string('tecnica')->nullable();
            $table->string('profesional')->nullable();
            $table->string('tiempo_experiencia')->nullable();
            $table->text('detalle')->nullable();
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
        Schema::dropIfExists('datos_laborals');
    }
};
