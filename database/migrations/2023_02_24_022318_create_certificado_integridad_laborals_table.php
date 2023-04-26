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
        Schema::create('certificado_integridad_laborals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personals')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('certificado_procuraduria', ['Si', 'No']);
            $table->string('resultadop');
            $table->string('detallep')->nullable();
            $table->enum('certificado_institucion', ['Si', 'No']);
            $table->string('resultadoi');
            $table->string('detallei')->nullable();
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
        Schema::dropIfExists('certificado_integridad_laborals');
    }
};
