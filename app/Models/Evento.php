<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';
    protected $primaryKey = 'eventos_id';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugar'
    ];

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'eventos_id', 'eventos_id');
    }
}
