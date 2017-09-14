<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'alumno_escuela_id','fecha_apertura','fecha_cierre','observaciones','total_horas','total_montos', 'estado_expediente_id',
    ];

    public function alumno_escuela()
    {
        return $this->belongsTo('App\Alumno_escuela');
    }

    public function estado_expediente()
    {
        return $this->belongsTo('App\Estado_expediente');
    }
}