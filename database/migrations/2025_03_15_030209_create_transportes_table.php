<?php

// database/migrations/2023_10_15_create_transportes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportesTable extends Migration
{
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Ej: coche, bicicleta, transporte público
            $table->float('huella_carbono_por_km'); // Huella de carbono por kilómetro
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transportes');
    }
}