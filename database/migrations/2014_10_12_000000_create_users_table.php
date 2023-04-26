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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('tipo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('logo')->nullable();
            $table->string('actividad')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
            $table->string('representante')->nullable();
            $table->string('telefono_representante')->nullable();
            $table->string('correo_representante')->nullable();
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('sector')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('referencia')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('cedula')->nullable();
            $table->string('telefono')->nullable();
            $table->string('flota')->nullable();
            $table->string('cargo')->nullable();
            $table->string('correo_personal')->nullable();
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
        Schema::dropIfExists('users');
    }
};
