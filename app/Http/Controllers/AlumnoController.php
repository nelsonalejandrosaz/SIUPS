<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumnoController extends Controller
{

  public function formularioAlumno()
  {
    return view('formularioAlumno');
  }

}
