<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'nombre_equipo',
        'descripcion',
        'fecha_creacion',
        'us_id',
        'rol_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'us_id', 'us_id');
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id_equipo', 'id_equipo');
    }
}
