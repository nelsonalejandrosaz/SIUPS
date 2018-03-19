<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    //
     protected $fillable = [
        'nombre','apellido','dui','correo','telefono','organizacion','telefono_organizacion','correo_organizacion','direccion_organizacion','municipio_id', 'tipo_id',
    ];

    public function beneficiario_ss()
    {
        return $this->hasMany('App\ServicioSocial');
    }
    
    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Tipo_beneficiario');
    }
}
