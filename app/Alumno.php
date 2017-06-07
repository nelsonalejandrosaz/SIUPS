<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
     protected $fillable = [
        'carnet','nombre','apellido','direccion','telefono','correo','lugar_trabajo','telefono_trabajo',
    ];
}
