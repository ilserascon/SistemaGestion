<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
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

            // Aquí defines la clave foránea:
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
