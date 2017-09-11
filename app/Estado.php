<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
     protected $fillable = [
        'codigo','nombre',
    ];

     public function estado_ss()
    {
        return $this->hasMany('App\ServicioSocial');
    }
}
