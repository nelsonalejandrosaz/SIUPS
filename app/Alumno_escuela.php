<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_escuela extends Model
{
    //
     protected $fillable = [
        'carnet','escuela_id',
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno','carnet','carnet');
    }

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    public function expediente()
    {
        return $this->hasOne('App\Expediente');
    }
}
