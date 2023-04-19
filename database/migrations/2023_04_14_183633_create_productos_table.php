<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('producto');
            $table->text('descripcion');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
