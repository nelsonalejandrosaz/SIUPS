<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialServicio extends Model
{
     protected $fillable = [
        'nombreSS','inicioSS','finSS','horastSS','horasaSS','beneficiarioSS','tutorSS'
    ];
}
