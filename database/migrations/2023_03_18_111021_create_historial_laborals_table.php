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
        Schema::create('historial_laborals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->nullable()->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('empresa');
            $table->string('labor');
            $table->string('ano_entrada')->nullable();
            $table->string('ano_salida')->nullable();
            $table->string('cantidad_ano')->nullable();
            $table->string('cantidad_meses')->nullable();
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
        Schema::dropIfExists('historial_laborals');
    }
};
