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
        Schema::create('candidato_externos', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('empresa')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('autorizado')->nullable();
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
        Schema::dropIfExists('candidato_externos');
    }
};
