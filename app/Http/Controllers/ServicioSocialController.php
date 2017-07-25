<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servicio_Social;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ServicioSocialController extends Controller
{

  //  public function AlumnosLista()
  //  {
  //      if (Auth::user()->rol[0]->id == 2) {
  //        $alumnos_escuela = Alumno_escuela::all();
  //      } else {
  //        $alumnos_escuela = Alumno_escuela::where('escuela_id', Auth::user()->escuela_id)->get();
  //      }
  //      return view('alumnos.alumnos_lista')->with(['alumnos_escuela' => $alumnos_escuela]);
  //  }


   public function registroServicioSocial()
  {
    return view('serviciosocial.registro_servicio_social');
  }

  public function guardarServicioSocial(Request $request)
  {
    //dd($request->all());
    $this->validate($request, [
        'nombreSS'=>'required|size:150',
        'inicioSS'=>'required',
        'horastSS'=>'required',
        'entidaddSS'=>'email',
      ]);
    $serviciosocial  = new Servicio_Social ;
    $serviciosocial->nombreSS = $request->nombreSS;
      $serviciosocial->inicioSS = $request->inicioSS;
        $serviciosocial->finSS = $request->finSS;
          $serviciosocial->horastSS = $request->horastSS;
            $serviciosocial->horasaSS = $request->horasaSS;
              $serviciosocial->entidaddSS = $request->entidaddSS;
                $serviciosocial->entidadiSS = $request->entidadiSS;

    if ((Servicio_Social::where('nombreSS','=',$request->nombreSS)->first()) == null) {
      Servicio_Social::firstOrCreate($serviciosocial->toArray());

      Servicio_Social::firstOrCreate(['nombreSS' => $nombreSS->nombreSS,]);
      session()->flash('mensaje', 'Ingresado con exito');
      //return redirect()->route('') ;
    } else {
      session()->flash('advertencia', 'Servicio social ya existente');
      //return redirect()->route('alumnoNuevo') ;
    }


  }

//  public function editarAlumno($id = 1)
//{
//      $alumno = Alumno::find($id);
//      return view('alumnos.alumno_editar')->with(['alumno' => $alumno]);
//  }

//  public function editarAlumnoGuardar(Request $request, $id){
//    $alumno = Alumno::find($id);
//    $alumno->carnet = $request->carnet;
//    $alumno->nombre = $request->nombre;
//    $alumno->apellido = $request->apellido;
//    $alumno->telefono = $request->telefono;
//    $alumno->lugar_trabajo = $request->lugar_trabajo;
//    $alumno->telefono_trabajo = $request->telefono_trabajo;
//    $alumno->correo = $request->correo;
//    $alumno->direccion = $request->direccion;
//    $alumno->update();
//    session()->flash('mensaje', 'Alumno modificado corectamente');
//   return redirect()->route('alumnoLista') ;
//  }

//    public function verAlumno($id)
//  {
//      $alumno = Alumno::find($id);
//      return view('alumnos.alumno_ver')->with(['alumno' => $alumno]);
//  }

}
