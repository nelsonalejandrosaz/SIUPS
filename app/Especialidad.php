<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
  protected $fillable = [
      'tipo',
  ];

  protected $table='especialidads';
}
