<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id'); // Cambia a string para coincidir con DNI
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('users_id');
            $table->boolean('estado')->default(false);
            $table->boolean('estado_perdido')->default(false); // Estado perdido (0: no perdida, 1: perdida)

            $table->timestamps();

            // Establece las llaves foráneas
            $table->foreign('doctor_id')->references('dni')->on('doctor')->onDelete('cascade'); // Referencia al DNI
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
