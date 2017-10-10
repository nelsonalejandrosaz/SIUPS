<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_expediente extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function expediente()
    {
        return $this->hasOne('App\Expediente');
    }
    
}
