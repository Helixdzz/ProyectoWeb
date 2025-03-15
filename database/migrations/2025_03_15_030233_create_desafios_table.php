<?php

// database/migrations/2023_10_15_create_desafios_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesafiosTable extends Migration
{
    public function up()
    {
        Schema::create('desafios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('recompensa'); // Puntos de recompensa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desafios');
    }
}