<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'noticia_id',
        'autor',
        'contenido',
        'likecomentario', // ✅ Para permitir actualizar likes
    ];

    // Relación: un comentario pertenece a una noticia
    public function noticia()
    {
        return $this->belongsTo(Noticias::class, 'noticia_id');
    }

}
