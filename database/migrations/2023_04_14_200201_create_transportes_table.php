<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->text('linea');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('transportes');
    }
};
