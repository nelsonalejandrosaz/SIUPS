<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente_servicio_social extends Model
{
    //
     protected $fillable = [
        'expediente_alumno_id','servicio_social_id','horas_ganadas','estado_ss_estudiante','carnet_exp',
    ];

    
    protected $table='expediente_serviciosocials';

    //agregado
    public function ssexp()
    {
        return $this->belongsTo('App\ServicioSocial','servicio_social_id');
    }
}
