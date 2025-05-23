<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id('idProv'); // Usa `id('idProv')` para clave primaria autoincremental
            $table->string('Provincia', 50);
            $table->unsignedBigInteger('idReg'); // Asegúrate de que `idReg` coincida con el tipo en la tabla `regiones`
            $table->timestamps();
            
            // Definir clave foránea
            $table->foreign('idReg')->references('idReg')->on('regiones')->onDelete('cascade');
        });
        // Insertar datos por defecto
        DB::table('provincias')->insert([
            ['Provincia' => 'CHACHAPOYAS', 'idReg' => 1],
            ['Provincia' => 'BAGUA', 'idReg' => 1],
            ['Provincia' => 'BONGARA', 'idReg' => 1],
            ['Provincia' => 'CONDORCANQUI', 'idReg' => 1],
            ['Provincia' => 'LUYA', 'idReg' => 1],
            ['Provincia' => 'RODRIGUEZ DE MENDOZA', 'idReg' => 1],
            ['Provincia' => 'UTCUBAMBA', 'idReg' => 1],
            ['Provincia' => 'HUARAZ', 'idReg' => 2],
            ['Provincia' => 'AIJA', 'idReg' => 2],
            ['Provincia' => 'ANTONIO RAYMONDI', 'idReg' => 2],
            ['Provincia' => 'ASUNCION', 'idReg' => 2],
            ['Provincia' => 'BOLOGNESI', 'idReg' => 2],
            ['Provincia' => 'CARHUAZ', 'idReg' => 2],
            ['Provincia' => 'CARLOS FERMIN FITZCARRALD', 'idReg' => 2],
            ['Provincia' => 'CASMA', 'idReg' => 2],
            ['Provincia' => 'CORONGO', 'idReg' => 2],
            ['Provincia' => 'HUARI', 'idReg' => 2],
            ['Provincia' => 'HUARMEY', 'idReg' => 2],
            ['Provincia' => 'HUAYLAS', 'idReg' => 2],
            ['Provincia' => 'MARISCAL LUZURIAGA', 'idReg' => 2],
            ['Provincia' => 'OCROS', 'idReg' => 2],
            ['Provincia' => 'PALLASCA', 'idReg' => 2],
            ['Provincia' => 'POMABAMBA', 'idReg' => 2],
            ['Provincia' => 'RECUAY', 'idReg' => 2],
            ['Provincia' => 'SANTA', 'idReg' => 2],
            ['Provincia' => 'SIHUAS', 'idReg' => 2],
            ['Provincia' => 'YUNGAY', 'idReg' => 2],
            ['Provincia' => 'ABANCAY', 'idReg' => 3],
            ['Provincia' => 'ANDAHUAYLAS', 'idReg' => 3],
            ['Provincia' => 'ANTABAMBA', 'idReg' => 3],
            ['Provincia' => 'AYMARAES', 'idReg' => 3],
            ['Provincia' => 'COTABAMBAS', 'idReg' => 3],
            ['Provincia' => 'CHINCHEROS', 'idReg' => 3],
            ['Provincia' => 'GRAU', 'idReg' => 3],
            ['Provincia' => 'AREQUIPA', 'idReg' => 4],
            ['Provincia' => 'CAMANA', 'idReg' => 4],
            ['Provincia' => 'CARAVELI', 'idReg' => 4],
            ['Provincia' => 'CASTILLA', 'idReg' => 4],
            ['Provincia' => 'CAYLLOMA', 'idReg' => 4],
            ['Provincia' => 'CONDESUYOS', 'idReg' => 4],
            ['Provincia' => 'ISLAY', 'idReg' => 4],
            ['Provincia' => 'LA UNION', 'idReg' => 4],
            ['Provincia' => 'HUAMANGA', 'idReg' => 5],
            ['Provincia' => 'CANGALLO', 'idReg' => 5],
            ['Provincia' => 'HUANCA SANCOS', 'idReg' => 5],
            ['Provincia' => 'HUANTA', 'idReg' => 5],
            ['Provincia' => 'LA MAR', 'idReg' => 5],
            ['Provincia' => 'LUCANAS', 'idReg' => 5],
            ['Provincia' => 'PARINACOCHAS', 'idReg' => 5],
            ['Provincia' => 'PAUCAR DEL SARA SARA', 'idReg' => 5],
            ['Provincia' => 'SUCRE', 'idReg' => 5],
            ['Provincia' => 'VICTOR FAJARDO', 'idReg' => 5],
            ['Provincia' => 'VILCAS HUAMAN', 'idReg' => 5],
            ['Provincia' => 'CAJAMARCA', 'idReg' => 6],
            ['Provincia' => 'CAJABAMBA', 'idReg' => 6],
            ['Provincia' => 'CELENDIN', 'idReg' => 6],
            ['Provincia' => 'CHOTA', 'idReg' => 6],
            ['Provincia' => 'CONTUMAZA', 'idReg' => 6],
            ['Provincia' => 'CUTERVO', 'idReg' => 6],
            ['Provincia' => 'HUALGAYOC', 'idReg' => 6],
            ['Provincia' => 'JAEN', 'idReg' => 6],
            ['Provincia' => 'SAN IGNACIO', 'idReg' => 6],
            ['Provincia' => 'SAN MARCOS', 'idReg' => 6],
            ['Provincia' => 'SAN PABLO', 'idReg' => 6],
            ['Provincia' => 'SANTA CRUZ', 'idReg' => 6],
            ['Provincia' => 'CALLAO', 'idReg' => 7],
            ['Provincia' => 'CUSCO', 'idReg' => 8],
            ['Provincia' => 'ACOMAYO', 'idReg' => 8],
            ['Provincia' => 'ANTA', 'idReg' => 8],
            ['Provincia' => 'CALCA', 'idReg' => 8],
            ['Provincia' => 'CANAS', 'idReg' => 8],
            ['Provincia' => 'CANCHIS', 'idReg' => 8],
            ['Provincia' => 'CHUMBIVILCAS', 'idReg' => 8],
            ['Provincia' => 'ESPINAR', 'idReg' => 8],
            ['Provincia' => 'LA CONVENCION', 'idReg' => 8],
            ['Provincia' => 'PARURO', 'idReg' => 8],
            ['Provincia' => 'PAUCARTAMBO', 'idReg' => 8],
            ['Provincia' => 'QUISPICANCHI', 'idReg' => 8],
            ['Provincia' => 'URUBAMBA', 'idReg' => 8],
            ['Provincia' => 'HUANCAVELICA', 'idReg' => 9],
            ['Provincia' => 'ACOBAMBA', 'idReg' => 9],
            ['Provincia' => 'ANGARAES', 'idReg' => 9],
            ['Provincia' => 'CASTROVIRREYNA', 'idReg' => 9],
            ['Provincia' => 'CHURCAMPA', 'idReg' => 9],
            ['Provincia' => 'HUAYTARA', 'idReg' => 9],
            ['Provincia' => 'TAYACAJA', 'idReg' => 9],
            ['Provincia' => 'HUANUCO', 'idReg' => 10],
            ['Provincia' => 'AMBO', 'idReg' => 10],
            ['Provincia' => 'DOS DE MAYO', 'idReg' => 10],
            ['Provincia' => 'HUACAYBAMBA', 'idReg' => 10],
            ['Provincia' => 'HUAMALIES', 'idReg' => 10],
            ['Provincia' => 'LEONCIO PRADO', 'idReg' => 10],
            ['Provincia' => 'MARANON', 'idReg' => 10],
            ['Provincia' => 'PACHITEA', 'idReg' => 10],
            ['Provincia' => 'PUERTO INCA', 'idReg' => 10],
            ['Provincia' => 'LAURICOCHA', 'idReg' => 10],
            ['Provincia' => 'YAROWILCA', 'idReg' => 10],
            ['Provincia' => 'ICA', 'idReg' => 11],
            ['Provincia' => 'CHINCHA', 'idReg' => 11],
            ['Provincia' => 'NAZCA', 'idReg' => 11],
            ['Provincia' => 'PALPA', 'idReg' => 11],
            ['Provincia' => 'PISCO', 'idReg' => 11],
            ['Provincia' => 'HUANCAYO', 'idReg' => 12],
            ['Provincia' => 'CONCEPCION', 'idReg' => 12],
            ['Provincia' => 'CHANCHAMAYO', 'idReg' => 12],
            ['Provincia' => 'JAUJA', 'idReg' => 12],
            ['Provincia' => 'JUNIN', 'idReg' => 12],
            ['Provincia' => 'SATIPO', 'idReg' => 12],
            ['Provincia' => 'TARMA', 'idReg' => 12],
            ['Provincia' => 'YAULI', 'idReg' => 12],
            ['Provincia' => 'CHUPACA', 'idReg' => 12],
            ['Provincia' => 'TRUJILLO', 'idReg' => 13],
            ['Provincia' => 'ASCOPE', 'idReg' => 13],
            ['Provincia' => 'BOLIVAR', 'idReg' => 13],
            ['Provincia' => 'CHEPEN', 'idReg' => 13],
            ['Provincia' => 'JULCAN', 'idReg' => 13],
            ['Provincia' => 'OTUZCO', 'idReg' => 13],
            ['Provincia' => 'PACASMAYO', 'idReg' => 13],
            ['Provincia' => 'PATAZ', 'idReg' => 13],
            ['Provincia' => 'SANCHEZ CARRION', 'idReg' => 13],
            ['Provincia' => 'SANTIAGO DE CHUCO', 'idReg' => 13],
            ['Provincia' => 'GRAN CHIMU', 'idReg' => 13],
            ['Provincia' => 'VIRU', 'idReg' => 13],
            ['Provincia' => 'CHICLAYO', 'idReg' => 14],
            ['Provincia' => 'FERREÑAFE', 'idReg' => 14],
            ['Provincia' => 'LAMBAYEQUE', 'idReg' => 14],
            ['Provincia' => 'LIMA', 'idReg' => 15],
            ['Provincia' => 'BARRANCA', 'idReg' => 15],
            ['Provincia' => 'CAJATAMBO', 'idReg' => 15],
            ['Provincia' => 'CANTA', 'idReg' => 15],
            ['Provincia' => 'CAÑETE', 'idReg' => 15],
            ['Provincia' => 'HUARAL', 'idReg' => 15],
            ['Provincia' => 'HUAROCHIRI', 'idReg' => 15],
            ['Provincia' => 'HUAURA', 'idReg' => 15],
            ['Provincia' => 'OYON', 'idReg' => 15],
            ['Provincia' => 'YAUYOS', 'idReg' => 15],
            ['Provincia' => 'MAYNAS', 'idReg' => 16],
            ['Provincia' => 'ALTO AMAZONAS', 'idReg' => 16],
            ['Provincia' => 'LORETO', 'idReg' => 16],
            ['Provincia' => 'MARISCAL RAMON CASTILLA', 'idReg' => 16],
            ['Provincia' => 'REQUENA', 'idReg' => 16],
            ['Provincia' => 'UCAYALI', 'idReg' => 16],
            ['Provincia' => 'TAMBOPATA', 'idReg' => 17],
            ['Provincia' => 'MANU', 'idReg' => 17],
            ['Provincia' => 'TAHUAMANU', 'idReg' => 17],
            ['Provincia' => 'MARISCAL NIETO', 'idReg' => 18],
            ['Provincia' => 'GENERAL SANCHEZ CERRO', 'idReg' => 18],
            ['Provincia' => 'ILO', 'idReg' => 18],
            ['Provincia' => 'PASCO', 'idReg' => 19],
            ['Provincia' => 'DANIEL ALCIDES CARRION', 'idReg' => 19],
            ['Provincia' => 'OXAPAMPA', 'idReg' => 19],
            ['Provincia' => 'PIURA', 'idReg' => 20],
            ['Provincia' => 'AYABACA', 'idReg' => 20],
            ['Provincia' => 'HUANCABAMBA', 'idReg' => 20],
            ['Provincia' => 'MORROPON', 'idReg' => 20],
            ['Provincia' => 'PAITA', 'idReg' => 20],
            ['Provincia' => 'SULLANA', 'idReg' => 20],
            ['Provincia' => 'TALARA', 'idReg' => 20],
            ['Provincia' => 'SECHURA', 'idReg' => 20],
            ['Provincia' => 'PUNO', 'idReg' => 21],
            ['Provincia' => 'AZANGARO', 'idReg' => 21],
            ['Provincia' => 'CARABAYA', 'idReg' => 21],
            ['Provincia' => 'CHUCUITO', 'idReg' => 21],
            ['Provincia' => 'EL COLLAO', 'idReg' => 21],
            ['Provincia' => 'HUANCANE', 'idReg' => 21],
            ['Provincia' => 'LAMPA', 'idReg' => 21],
            ['Provincia' => 'MELGAR', 'idReg' => 21],
            ['Provincia' => 'MOHO', 'idReg' => 21],
            ['Provincia' => 'SAN ANTONIO DE PUTINA', 'idReg' => 21],
            ['Provincia' => 'SAN ROMAN', 'idReg' => 21],
            ['Provincia' => 'SANDIA', 'idReg' => 21],
            ['Provincia' => 'YUNGUYO', 'idReg' => 21],
            ['Provincia' => 'MOYOBAMBA', 'idReg' => 22],
            ['Provincia' => 'BELLAVISTA', 'idReg' => 22],
            ['Provincia' => 'EL DORADO', 'idReg' => 22],
            ['Provincia' => 'HUALLAGA', 'idReg' => 22],
            ['Provincia' => 'LAMAS', 'idReg' => 22],
            ['Provincia' => 'MARISCAL CACERES', 'idReg' => 22],
            ['Provincia' => 'PICOTA', 'idReg' => 22],
            ['Provincia' => 'RIOJA', 'idReg' => 22],
            ['Provincia' => 'SAN MARTIN', 'idReg' => 22],
            ['Provincia' => 'TOCACHE', 'idReg' => 22],
            ['Provincia' => 'TACNA', 'idReg' => 23],
            ['Provincia' => 'CANDARAVE', 'idReg' => 23],
            ['Provincia' => 'JORGE BASADRE', 'idReg' => 23],
            ['Provincia' => 'TARATA', 'idReg' => 23],
            ['Provincia' => 'TUMBES', 'idReg' => 24],
            ['Provincia' => 'CONTRALMIRANTE VILLAR', 'idReg' => 24],
            ['Provincia' => 'ZARUMILLA', 'idReg' => 24],
            ['Provincia' => 'CORONEL PORTILLO', 'idReg' => 25],
            ['Provincia' => 'ATALAYA', 'idReg' => 25],
            ['Provincia' => 'PADRE ABAD', 'idReg' => 25],
            ['Provincia' => 'PURUS', 'idReg' => 25],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
