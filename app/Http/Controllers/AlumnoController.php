<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class AlumnoController extends Controller
{

    public function alumnos_lista()
    {
        $alumnos = Alumno::all();
        return view('alumnos.alumnos_lista')->with(['alumnos' => $alumnos]);
    }

}
