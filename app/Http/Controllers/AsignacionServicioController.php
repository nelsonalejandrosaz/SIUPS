<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicioSocial;
use App\Tutor;
use App\Alumno_escuela;
use Illuminate\Support\Facades\Auth;
use App\Estado;
use App\Expediente_Servicio_Social;

class AsignacionServicioController extends Controller
{
    //

     public function AsignacionServicio($id)
    {
        $servicioSocial = ServicioSocial::find($id);
        $alumnos_asignados=$servicioSocial->expediente_serviciosocials;
        $hayalumnos=isset($alumnos_asignados);
        $tutores = Tutor::all();
        $estados = Estado::all();
        $alumnos_escuela = Alumno_escuela::where('escuela_id', Auth::user()->escuela_id)->get();  
        return view('asignar.servicioSocialAsignar')->with(['servicioSocial' => $servicioSocial])->with(['Tutors' => $tutores])->with(['alumnos_escuela' => $alumnos_escuela])->with(['estados'=>$estados])->with(['alumnos_asignados'=>$alumnos_asignados])->with(['hayalumnos'=>$hayalumnos]);
    }

    public function AsignacionServicioPost(Request $request)
    {
    	 $id= $request->id;
    	 $servicioSocial = ServicioSocial::find($id);
    	 $servicioSocial->estado_id = $request->input('estado_id');
    	
    	   $servicioSocial->save();
    	   $estudiantes = $request->input('estudiantes');
    	   $horas_ganadas = $request->input('horas_ganadas');
    	   $estado_ss_estudiante = $request->input('estado_ss_estudiante');
    	   $maximo_estudiantes= sizeof($estudiantes);
    	   for ($i=0; $i<$maximo_estudiantes ; $i++) { 
    	   	$expediente_servicio_social = Expediente_Servicio_Social::create([
    	   			'expediente_alumno_id' =>$estudiantes[$i],
    			    'servicio_social_id' => $id,
      				'horas_ganadas' => $horas_ganadas[$i],
      				'estado_ss_estudiante' => $estado_ss_estudiante[$i],
    	   		]);

    	   }
dd('funciono');
      session()->flash('message', 'Servicio modificado corectamente');
    }
}
