<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'dni'); // Referenciando 'dni'
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }
}


