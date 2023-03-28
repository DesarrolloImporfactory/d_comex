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
        Schema::create('arancel_partidas', function (Blueprint $table) {
            $table->id();
            $table->string("partida_clave");
            $table->string("capitulo");
            $table->string("codigo_suplementario");
            $table->string("partida_");
            $table->string("subpartida");
            $table->string("tipo_de_elemento");
            $table->string("descripcion_partida");
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
        Schema::dropIfExists('arancel_partidas');
    }
};
