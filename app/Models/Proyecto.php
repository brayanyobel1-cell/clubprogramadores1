<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'proyectos_id';

    protected $fillable = [
        'us_nombre',
        'descripcion',
        'repositorio_url',
        'fecha_creacion',
        'creador_id',
        'id_equipo'
    ];

    public function creador()
    {
        return $this->belongsTo(Usuario::class, 'creador_id', 'us_id');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo', 'id_equipo');
    }
}
