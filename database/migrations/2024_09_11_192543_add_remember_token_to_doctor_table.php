<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->rememberToken(); // Agrega la columna remember_token
        });
    }

    public function down(): void
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->dropColumn('remember_token'); // Elimina la columna en caso de rollback
        });
    }
};
