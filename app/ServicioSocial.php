<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioSocial extends Model
{
    //
     protected $fillable = [
        'nombre','tutor_id','beneficiario_id','municipio_id','fecha_ingreso','fecha_fin','monto','beneficiarios_directos','beneficiarios_indirectos','estado_id','horas_totales','numero_estudiantes',
    ];

    protected $table='servicio_social';
}
