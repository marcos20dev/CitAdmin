<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->unsignedBigInteger('idReg')->autoIncrement(); // Define `idReg` como columna autoincremental
            $table->string('Region', 50);
            $table->timestamps();
        });

        // Insertar datos por defecto
        DB::table('regiones')->insert([
            ['Region' => 'AMAZONAS'],
            ['Region' => 'ANCASH'],
            ['Region' => 'APURIMAC'],
            ['Region' => 'AREQUIPA'],
            ['Region' => 'AYACUCHO'],
            ['Region' => 'CAJAMARCA'],
            ['Region' => 'CALLAO'],
            ['Region' => 'CUSCO'],
            ['Region' => 'HUANCAVELICA'],
            ['Region' => 'HUANUCO'],
            ['Region' => 'ICA'],
            ['Region' => 'JUNIN'],
            ['Region' => 'LA LIBERTAD'],
            ['Region' => 'LAMBAYEQUE'],
            ['Region' => 'LIMA'],
            ['Region' => 'LORETO'],
            ['Region' => 'MADRE DE DIOS'],
            ['Region' => 'MOQUEGUA'],
            ['Region' => 'PASCO'],
            ['Region' => 'PIURA'],
            ['Region' => 'PUNO'],
            ['Region' => 'SAN MARTIN'],
            ['Region' => 'TACNA'],
            ['Region' => 'TUMBES'],
            ['Region' => 'UCAYALI'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regiones');
    }
};
