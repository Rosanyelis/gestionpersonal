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
        Schema::create('referencias_personales_familiares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('lugar_nacimiento');
            $table->string('telefono');
            $table->string('vinculo');
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
        Schema::dropIfExists('referencias_personales_familiares');
    }
};
