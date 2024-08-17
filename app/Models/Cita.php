<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function horarios()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }
}
