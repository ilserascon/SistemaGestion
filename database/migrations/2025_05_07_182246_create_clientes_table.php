<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('rfc');
            $table->string('razon social');
            $table->string('direccion');
            $table->string('colonia');
            $table->string('numero interior');
            $table->string('numero exterior');
            $table->string('codigo postal');
            $table->string('localidad');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('correo');
            $table->string('telefono');
            $table->string('celular');
            $table->boolean('borrado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};