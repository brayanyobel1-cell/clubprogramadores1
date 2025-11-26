<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contacto';
    protected $primaryKey = 'id_contacto';

    protected $fillable = [
        'Nombre',
        'us_id',
        'correo',
        'Asunto',
        'Mensaje'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'us_id', 'us_id');
    }
}
