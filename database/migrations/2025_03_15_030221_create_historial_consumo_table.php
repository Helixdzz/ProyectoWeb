<?php

// database/migrations/2023_10_15_create_historial_consumo_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialConsumoTable extends Migration
{
    public function up()
    {
        Schema::create('historial_consumo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Relación con productos
            $table->foreignId('transporte_id')->constrained('transportes')->onDelete('cascade'); // Relación con transportes
            $table->date('fecha'); // Fecha del registro
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_consumo');
    }
}
