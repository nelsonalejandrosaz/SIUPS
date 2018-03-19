<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'alumno_escuela_id','fecha_apertura','fecha_cierre','observaciones','total_horas','total_montos', 'estado_expediente_id', 'certificado',  'ingresadoPor', 'modificadoPor',
    ];

    public function alumno_escuela()
    {
        return $this->belongsTo('App\Alumno_escuela');
    }

    public function estado_expediente()
    {
        return $this->belongsTo('App\Estado_expediente'); //has many (?)
    }
    public function serviciossociales()
    {
        return $this->hasMany('App\Expediente_servicio_social','expediente_alumno_id');
    }




}
