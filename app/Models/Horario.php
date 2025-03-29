<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';
    protected $fillable = ['dni_doctor', 'fecha', 'hora', 'intervalo'];

    public function doctor()
    {
        // Parámetros correctos:
        // 1. Modelo relacionado
        // 2. Columna LOCAL en horarios (dni_doctor)
        // 3. Columna REMOTA en doctors (dni)
        return $this->belongsTo(Doctor::class, 'dni_doctor', 'dni');
    }
}
