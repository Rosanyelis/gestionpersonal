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
        Schema::create('reporte_actividad_no_procesadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('personal_id')->nullable()->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('quien_reporta')->nullable();
            $table->string('fecha')->nullable();
            $table->string('hora')->nullable();
            $table->string('empresa')->nullable();
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('sector')->nullable();
            $table->string('tipo_reporte')->nullable();
            $table->string('tipo_involucrado')->nullable();
            $table->text('detalles')->nullable();
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
        Schema::dropIfExists('reporte_actividad_no_procesadas');
    }
};
