<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganigramasTable extends Migration
{
    public function up()
    {
        Schema::create('organigramas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('puesto', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organigramas');
    }
}

