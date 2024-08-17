<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Soporte extends Authenticatable
{
    use HasFactory, Notifiable;

    // Especifica el nombre de la tabla
    protected $table = 'soporte';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Atributos ocultos para los arrays
    protected $hidden = [
        'password', 'remember_token',
    ];
}