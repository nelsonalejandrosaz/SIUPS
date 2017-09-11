<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    //
     protected $fillable = [
        'nombre','apellido','dui','correo','telefono','organizacion','telefonoOrganizacion','correoOrganizacion','direccionOrganizacion',
    ];

    public function beneficiario_ss()
    {
        return $this->hasMany('App\ServicioSocial');
    }
}
