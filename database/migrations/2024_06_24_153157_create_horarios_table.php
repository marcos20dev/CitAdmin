<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dni_doctor');
            $table->date('fecha');
            $table->string('hora');  // Rango del intervalo de tiempo
            $table->integer('intervalo')->default(15); // Intervalo de tiempo en minutos
            $table->boolean('ocupado')->default(false); // Campo para indicar si el horario está ocupado
            $table->timestamps();

            // Clave foránea para relacionar con la tabla de doctor
            $table->foreign('dni_doctor')->references('dni')->on('doctor')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
