<?php

// database/migrations/2023_10_15_create_desafio_user_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesafioUserTable extends Migration
{
    public function up()
    {
        Schema::create('desafio_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desafio_id')->constrained('desafios')->onDelete('cascade'); // Relación con desafios
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desafio_user');
    }
}
