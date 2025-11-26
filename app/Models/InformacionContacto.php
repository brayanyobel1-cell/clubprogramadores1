<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionContacto extends Model
{
    use HasFactory;

    protected $table = 'informacion_de_contacto';
    protected $primaryKey = 'id_Informacion';

    protected $fillable = [
        'Direccion',
        'Correo',
        'Redes_sociales',
        'id_contacto'
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'id_contacto', 'id_contacto');
    }
}
