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
            $table->string('razon_social');
            $table->string('direccion');
            $table->string('colonia');
            $table->string('numero_interior')->nullable();
            $table->string('numero_exterior');
            $table->string('codigo_postal');
            $table->string('localidad');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('correo');
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
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