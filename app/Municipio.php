<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'nombre', 'departamento_id',
    ];

    public function municipio_ss()
    {
        return $this->hasMany('App\ServicioSocial');//para sacar todos los servicios soiales de ese municipio
    }
}
