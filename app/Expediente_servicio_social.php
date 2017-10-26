<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente_servicio_social extends Model
{
    //
     protected $fillable = [
        'expediente_alumno_id','servicio_social_id','horas_ganadas','estado_ss_estudiante',
    ];

    protected $table='expediente_serviciosocials';
}
