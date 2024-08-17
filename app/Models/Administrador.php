<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'administradores'; // Confirma que esta es la tabla correcta

    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'cargo', 'foto_perfil', 'usuario', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}