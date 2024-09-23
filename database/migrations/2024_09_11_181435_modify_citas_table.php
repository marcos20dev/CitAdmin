<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar la clave foránea
            $table->dropForeign(['doctor_id']); // Eliminar clave foránea

            // Cambiar el tipo de columna 'doctor_id' de unsignedBigInteger a string
            $table->string('doctor_id')->change(); // Cambiar tipo de columna a string

            // Volver a agregar la clave foránea, apuntando al campo 'dni' de la tabla 'doctor'
            $table->foreign('doctor_id')->references('dni')->on('doctor')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar la nueva clave foránea
            $table->dropForeign(['doctor_id']); 

            // Revertir el cambio de tipo de columna a unsignedBigInteger
            $table->unsignedBigInteger('doctor_id')->change(); // Revertir a tipo original

            // Volver a agregar la clave foránea original apuntando a 'id'
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade');
        });
    }
};
