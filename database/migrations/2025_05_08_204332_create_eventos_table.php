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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('titulo'); // Título del evento
            $table->dateTime('inicio'); // Fecha y hora de inicio
            $table->dateTime('fin')->nullable(); // Fecha y hora de finalización (opcional)
            $table->text('descripcion')->nullable(); // Descripción del evento (opcional)
            $table->unsignedBigInteger('etiqueta_id')->nullable(); // Relación con etiquetas
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('set null'); // Clave foránea
            $table->timestamps(); // Campos de fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};