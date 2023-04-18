<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('embarcadors', function (Blueprint $table) {
            $table->id();
            $table->text('remitente');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('embarcadors');
    }
};
