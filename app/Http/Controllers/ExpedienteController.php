<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Alumno_escuela;
use App\Expediente;
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
        //validando que un coordinador no pueda entrar al expediente de otro alumno de otra escuela, solo de su escuela y el jefe que puede ver todos
        $alumno_escuelas=Alumno_escuela::where('carnet',$carnet)->get();
        foreach ($alumno_escuelas as $alumno_escuela ) {
            # code...
       
    if ( Auth::user()->escuela_id == $alumno_escuela->escuela->id || Auth::user()->rol[0]->nombre=='jefe') {

    	//$alumno_escuela = Alumno_escuela::where('carnet',$carnet)->first();
    	return view('expediente.expedienteVer')->with(['alumno_escuela' =>$alumno_escuela]);
    }
}

  return redirect()->route('permisoDenegado');
}
   
}
