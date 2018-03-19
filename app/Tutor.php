<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'nombre','apellido','carnet','especialidad_id','dui','correo',
    ];

    public function tutor_ss()
    {
        return $this->hasMany('App\ServicioSocial');
    }

}
