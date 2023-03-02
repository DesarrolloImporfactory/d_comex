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
        Schema::create('declaracion_ecuadors', function (Blueprint $table) {
            $table->id();
            $table->string('ruc');
            $table->string('producto');
            $table->string('marca');
            $table->string('embarcador_consigne');
            $table->string('refrendo');
            $table->string('subpartida');
            $table->string('linea');
            $table->string('agente_afianzado');
            $table->string('dep_comercial');
            $table->string('distrito');
            $table->string('iva');
            $table->string('pais_origen');
            $table->string('pais_embarque');
            $table->string('ciudad_embarque');
            $table->string('regimen');
            $table->string('incoterm');
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
        Schema::dropIfExists('declaracion_ecuadors');
    }
};
