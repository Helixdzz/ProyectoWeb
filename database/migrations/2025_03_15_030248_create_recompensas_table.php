<?php

// database/migrations/2023_10_15_create_recompensas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecompensasTable extends Migration
{
    public function up()
    {
        Schema::create('recompensas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('puntos_requeridos'); // Puntos necesarios para canjear
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recompensas');
    }
}