<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre', 'apellido', 'correo', 'dni', 'especialidad', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'doctor';
}
