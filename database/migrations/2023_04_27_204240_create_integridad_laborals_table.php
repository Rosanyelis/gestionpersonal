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
        Schema::create('integridad_laborals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->nullable()->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('candidato_id')->nullable()->constrained('candidato_externos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('fecha')->nullable();
            $table->string('empresa')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('autorizado')->nullable();
            $table->enum('certificado_procuraduria', ['Si', 'No']);
            $table->enum('certificado_institucion', ['Si', 'No']);
            $table->enum('actividad_antisocial', ['Si', 'No']);
            $table->enum('reporte_actividad_noprocesada', ['Si', 'No']);
            $table->enum('prueba_poligrafica', ['Si', 'No']);
            $table->enum('prueba_psicometrica', ['Si', 'No']);
            $table->enum('enfermedades_contagiosas', ['Si', 'No']);
            $table->enum('consumo_alcohol', ['Si', 'No']);
            $table->enum('sustancia_prohibida', ['Si', 'No']);
            $table->enum('visita_domiciliaria', ['Si', 'No']);
            $table->enum('levantamiento_coordinado', ['Si', 'No']);
            $table->enum('investigacion_entorno', ['Si', 'No']);
            $table->enum('levantamiento_dactilar', ['Si', 'No']);
            $table->enum('levantamiento_fotografia', ['Si', 'No']);
            $table->enum('integridad_familiar', ['Si', 'No']);
            $table->string('resultado')->nullable();
            $table->string('detalle')->nullable();
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
        Schema::dropIfExists('integridad_laborals');
    }
};
