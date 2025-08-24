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
            $table->id();
            $table->string('evento'); // Nombre o título del evento
            $table->dateTime('start_date'); // Fecha y hora de inicio
            $table->dateTime('end_date')->nullable(); // Fecha y hora de fin, nullable por si no hay fin definido
            $table->timestamps();

            // Índices para optimizar búsquedas por fechas
            $table->index('start_date');
            $table->index('end_date');
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
