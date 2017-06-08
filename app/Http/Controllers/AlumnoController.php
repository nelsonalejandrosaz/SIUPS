<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumnoController extends Controller
{

  public function registroAlumno()
  {
    return view('alumnos.alumno_registro_manual');
  }

  public function guardarAlumno(Request $request)
  {
    
    dd($request->all());
  }

}
