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
        Schema::create('arancel_capitulos', function (Blueprint $table) {
            //$table->id();
            $table->string('capitulo')->primary();
            $table->string('seccion');
            // $table->string('seccion')->unique()->nullable();
            // $table->foreign('seccion')->references('codigo_seccion')->on('arancel_seccions')->onUpdate('cascade');
            
            $table->string('tipo_elemento');
            $table->string('descripcion_capitulo');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arancel_capitulos');
    }
};
