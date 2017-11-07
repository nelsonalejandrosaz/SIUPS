<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Alumno_escuela;
use App\Expediente;
use App\Expediente_servicio_social;
use App\ServicioSocial;
use App\Tutor;
use App\Estado;
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
        $expediente_servicios= Expediente_servicio_social::all();
        $ss= ServicioSocial::all();
       $expediente= Expediente::all();
       $tutor= Tutor::all();
       $estadoSS = Estado::all();
        $i=0;


         if ( Auth::user()->rol[0]->nombre=='jefe') {
            $alumno_escuela=Alumno_escuela::where('carnet',$carnet)->first();
        }
        else {
       $alumno_escuela=Alumno_escuela::where([['carnet',$carnet], ['escuela_id',Auth::user()->escuela_id]])->first();
        }

        $existe_escuela=isset($alumno_escuela);
        //dd($alumno_escuela);
        if ($existe_escuela)
            {
                 $expe_ss=$alumno_escuela->expediente->serviciossociales;

         return view('expediente.expedienteVer')->with(['alumno_escuela' =>$alumno_escuela])->with(['ss' =>$ss])->with(['expediente_servicios' =>$expediente_servicios])->with(['expediente' =>$expediente])->with(['tutor' =>$tutor])->with(['estadoSS' =>$estadoSS])->with(['expe_ss' =>$expe_ss]);
            }
        else{
                return redirect()->route('permisoDenegado');
          }

      
       // dd($expe_ss);


 
}
   
}
