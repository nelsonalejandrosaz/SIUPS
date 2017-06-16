<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_escuela extends Model
{
    //
     protected $fillable = [
        'alumno_id','escuela_id',
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }
}
