<?php

// database/migrations/2023_10_15_create_recomendaciones_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacionesTable extends Migration
{
    public function up()
    {
        Schema::create('recomendaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->text('descripcion');
            $table->integer('prioridad'); // Nivel de prioridad (1-5)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recomendaciones');
    }
}
