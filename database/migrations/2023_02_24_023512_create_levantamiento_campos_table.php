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
        Schema::create('levantamiento_campos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('visita_domiciliaria', ['Si', 'No']);
            $table->string('resultadov');
            $table->string('detallev')->nullable();
            $table->enum('levantamiento_coordinado', ['Si', 'No']);
            $table->string('resultadol');
            $table->string('detallel')->nullable();
            $table->enum('investigacion_entorno', ['Si', 'No']);
            $table->string('resultadoi');
            $table->string('detallei')->nullable();
            $table->enum('levantamiento_dactilar', ['Si', 'No']);
            $table->string('resultadod');
            $table->string('detalled')->nullable();
            $table->enum('levantamiento_fotografia', ['Si', 'No']);
            $table->string('resultadof');
            $table->string('detallef')->nullable();
            $table->enum('integridad_familiar', ['Si', 'No']);
            $table->string('resultadofa');
            $table->string('detallefa')->nullable();
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
        Schema::dropIfExists('levantamiento_campos');
    }
};
