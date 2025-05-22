<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('procesos_cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('proceso_id');
            $table->boolean('validado')->default(false);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade');
        });

        DB::table('clientes')->get()->each(function ($cliente) {
            $procesos = DB::table('procesos')->get();
            foreach ($procesos as $proceso) {
                DB::table('procesos_cliente')->insert([
                    'cliente_id' => $cliente->id,
                    'proceso_id' => $proceso->id,
                    'validado' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos_cliente');
    }
};
