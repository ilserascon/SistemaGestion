<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganigramaConfiguracionTable extends Migration
{
    public function up()
    {
        Schema::create('organigrama_configuracion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_campo', 100);
            $table->string('etiqueta', 100)->nullable();
            $table->enum('tipo_dato', ['texto', 'numero', 'fecha', 'booleano']);
            $table->boolean('requerido')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organigrama_configuracion');
    }
}

