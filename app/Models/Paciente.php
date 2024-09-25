<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // Define la relación inversa con las citas
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
