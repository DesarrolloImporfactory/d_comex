<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->id();
            $table->text('dep_comercial');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('almacens');
    }
};
