<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    //
     protected $fillable = [
        'nombre','apellido','dui','correo','telefono','organizacion','telefono_organizacion','correo_organizacion','direccion_organizacion',
    ];

    public function beneficiario_ss()
    {
        return $this->hasMany('App\ServicioSocial');
    }
}
