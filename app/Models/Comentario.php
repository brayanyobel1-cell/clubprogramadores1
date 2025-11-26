<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'comentarios_id';

    protected $fillable = [
        'usuario_id',
        'contenido',
        'fecha_comentario',
        'articulos_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'us_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulos_id', 'articulos_id');
    }
}
