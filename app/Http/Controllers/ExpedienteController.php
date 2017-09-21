<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Alumno_escuela;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    public function ExpedienteLista()
    {
        if (Auth::user()->rol[0]->nombre == 'jefe') {
            $alumnos_escuela = Alumno_escuela::all();    
        } else {
            $alumnos_escuela = Alumno_escuela::where('escuela_id',Auth::user()->escuela_id)->get();            
        }
        // $alumnos_escuela = Alumno_escuela::all();
        return view('expediente.expedienteLista')->with(['alumnos_escuela' =>$alumnos_escuela]);
    }
    
    public function ExpedienteVer($carnet)
    {
    	$alumno_escuela = Alumno_escuela::where('carnet',$carnet)->first();
    	return view('expediente.expedienteVer')->with(['alumno_escuela' =>$alumno_escuela]);
    }
}
