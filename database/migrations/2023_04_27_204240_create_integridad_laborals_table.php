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
            $table->string('correo_autorizado')->nullable();
            $table->enum('certificado_procuraduria', ['Si', 'No']);
            $table->string('code_pro');
            $table->string('detalle_pro');
            $table->enum('certificado_institucion', ['Si', 'No']);
            $table->string('code_ins');
            $table->string('detalle_ins');
            $table->enum('actividad_antisocial', ['Si', 'No']);
            $table->string('code_ant');
            $table->string('detalle_ant');
            $table->enum('reporte_actividad_noprocesada', ['Si', 'No']);
            $table->string('code_nopro');
            $table->string('detalle_nopro');
            $table->enum('prueba_poligrafica', ['Si', 'No']);
            $table->string('code_pol');
            $table->string('detalle_pol');
            $table->enum('prueba_psicometrica', ['Si', 'No']);
            $table->string('code_psi');
            $table->string('detalle_psi');
            $table->enum('enfermedades_contagiosas', ['Si', 'No']);
            $table->string('code_cont');
            $table->string('detalle_cont');
            $table->enum('consumo_alcohol', ['Si', 'No']);
            $table->string('code_alc');
            $table->string('detalle_alc');
            $table->enum('sustancia_prohibida', ['Si', 'No']);
            $table->string('code_proh');
            $table->string('detalle_proh');
            $table->enum('visita_domiciliaria', ['Si', 'No']);
            $table->string('code_dom');
            $table->string('detalle_dom');
            $table->enum('levantamiento_coordinado', ['Si', 'No']);
            $table->string('code_coo');
            $table->string('detalle_coo');
            $table->enum('investigacion_entorno', ['Si', 'No']);
            $table->string('code_ent');
            $table->string('detalle_ent');
            $table->enum('levantamiento_dactilar', ['Si', 'No']);
            $table->string('code_dac');
            $table->string('detalle_dac');
            $table->enum('levantamiento_fotografia', ['Si', 'No']);
            $table->string('code_fot');
            $table->string('detalle_fot');
            $table->enum('integridad_familiar', ['Si', 'No']);
            $table->string('code_fam');
            $table->string('detalle_fam');
            $table->string('detalle_final')->nullable();
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
