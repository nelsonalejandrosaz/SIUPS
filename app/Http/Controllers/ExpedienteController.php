<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Alumno_escuela;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    public function ExpedienteVer($carnet)
    {
    	$alumno = Alumno::where('carnet',$carnet)->first();
    	$alumnos_escuela = $alumno->alumno_escuela;
    	foreach ($alumnos_escuela as $alumno_escuela) {
    		if ($alumno_escuela->escuela_id == Auth::user()->escuela_id) {
    			// $id = $alumno_escuela->id;
    			return view('expediente.expedienteVer')->with(['alumno_escuela' =>$alumno_escuela]);
    		}
    	}
    	// $alumnos_escuela = Alumno_escuela::where('id',$id);
    	return "nel";
    }
}
