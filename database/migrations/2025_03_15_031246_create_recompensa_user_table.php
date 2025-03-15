<?php

// database/migrations/2023_10_15_create_recompensa_user_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecompensaUserTable extends Migration
{
    public function up()
    {
        Schema::create('recompensa_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recompensa_id')->constrained('recompensas')->onDelete('cascade'); // Relación con recompensas
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recompensa_user');
    }
}