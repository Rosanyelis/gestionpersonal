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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codigo');
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('apodo')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->string('estado_civil');
            $table->string('nacionalidad');
            $table->string('tipo_sangre');
            $table->text('foto_frontal')->nullable();
            $table->text('foto_lateral')->nullable();
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
        Schema::dropIfExists('personals');
    }
};
