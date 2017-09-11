<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioSocial extends Model
{
    //
     protected $fillable = [
        'nombre','tutor_id','beneficiario_id','municipio_id','fecha_ingreso','fecha_fin','monto','beneficiarios_directos','beneficiarios_indirectos','estado_id','horas_totales','numero_estudiantes','modalidad_id',
    ];

    protected $table='servicio_social';

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
    public function beneficiario()
    {
        return $this->belongsTo('App\Beneficiario');
    }
     public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }

}
