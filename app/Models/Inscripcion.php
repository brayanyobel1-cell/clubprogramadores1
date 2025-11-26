<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';
    protected $primaryKey = 'inscripciones_id';

    protected $fillable = [
        'eventos_id',
        'fecha_inscripcion',
        'us_id'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'eventos_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'us_id', 'us_id');
    }
}
