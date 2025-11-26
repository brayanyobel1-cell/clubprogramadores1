<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'us_id';

    protected $fillable = [
        'us_nombre',
        'us_apellido',
        'us_email',
        'us_password',
        'fecha_registro',
        'rol_id',
    ];

    protected $hidden = [
        'us_password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->us_password;
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }
}
