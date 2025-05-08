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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->boolean('validado')->default(0); // Booleano con valor predeterminado
            $table->string('actividad')->nullable(); // Permitir nulos si no siempre se llena
            $table->string('responsable')->nullable(); // Permitir nulos
            $table->text('desarrollo')->nullable(); // Cambiado a text para contenido más largo
            $table->date('fecha_entregable')->nullable(); // Permitir nulos
            $table->date('fecha_finalizado')->nullable(); // Permitir nulos
            $table->string('tipo')->nullable(); // Permitir nulos
            $table->string('liga')->nullable(); // Permitir nulos
            $table->text('mensaje')->nullable(); // Permitir nulos
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
