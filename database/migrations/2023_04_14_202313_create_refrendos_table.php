<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('refrendos', function (Blueprint $table) {
            $table->id();
            $table->text('refrendo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('refrendos');
    }
};
