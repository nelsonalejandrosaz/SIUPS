<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'nombre','apellido','carnet','dui','correo',
    ];
}
