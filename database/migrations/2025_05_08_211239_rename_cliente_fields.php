<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameClienteFields extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->renameColumn('rfc', 'rfc');
            $table->renameColumn('razon Social', 'razon_social');
            $table->renameColumn('direccion', 'direccion');
            $table->renameColumn('colonia', 'colonia');
            $table->renameColumn('numero interior', 'numero_interior');
            $table->renameColumn('numero exterior', 'numero_exterior');
            $table->renameColumn('codigo postal', 'codigo_postal');
            $table->renameColumn('localidad', 'localidad');
            $table->renameColumn('ciudad', 'ciudad');
            $table->renameColumn('estado', 'estado');
            $table->renameColumn('correo', 'correo');
            $table->renameColumn('telefono', 'telefono');
            $table->renameColumn('celular', 'celular');
        });
    }

    public function down()
    {
        
    }
}