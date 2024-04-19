<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;

    protected $filable = ['Nombre', 'Apellido', 'Correo', 'DNI', 'Especialidad'];
}
