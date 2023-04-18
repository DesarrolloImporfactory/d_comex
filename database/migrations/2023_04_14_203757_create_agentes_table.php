<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->text('agente_afianzado');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('agentes');
    }
};
