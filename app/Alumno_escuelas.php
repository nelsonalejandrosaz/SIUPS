<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_escuelas extends Model
{
    //
     protected $fillable = [
        'alumno_id','escuela_id',
    ];

    public function alumno()
    {
        return $this->hasOne('App\Alumno');
    }

     public function escuela()
    {
        return $this->hasMany('App\Escuela');
    }
}
