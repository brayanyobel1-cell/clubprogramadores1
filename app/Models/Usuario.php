<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'us_id';

    protected $fillable = [
        'us_nombre',
        'us_apellido',
        'us_password',
        'us_email',
        'fecha_registro',
        'rol_id'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'us_id', 'us_id');
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'creador_id', 'us_id');
    }
}
