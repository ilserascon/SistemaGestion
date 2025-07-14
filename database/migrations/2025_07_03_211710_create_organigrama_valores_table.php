<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganigramaValoresTable extends Migration
{
    public function up()
    {
        Schema::create('organigrama_valores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('organigrama')->onDelete('cascade');
            $table->foreignId('campo_id')->constrained('organigrama_configuracion')->onDelete('cascade');
            $table->text('valor')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('organigrama_valores');
    }
}

