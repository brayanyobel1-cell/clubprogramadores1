<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';
    protected $primaryKey = 'articulos_id';

    protected $fillable = [
        'titulo',
        'contenido',
        'fecha_publicacion',
        'autor_id',
        'inscripciones_id'
    ];

    public function autor()
    {
        return $this->belongsTo(Usuario::class, 'autor_id', 'us_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'articulos_id', 'articulos_id');
    }
}
