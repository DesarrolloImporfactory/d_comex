<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('arancel_seccions', function (Blueprint $table) {
            //$table->id('codigo_seccion');
            $table->string('codigo_seccion')->primary();
            $table->string('subpartida');
            $table->string('tipo_de_elemento');
            $table->string('seccion_nombre');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('arancel_seccions');
    }
};
