<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno_escuela;
use App\Alumno;
use App\Escuela;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AlumnoController extends Controller
{

    public function AlumnosLista()
    {
        if (Auth::user()->rol[0]->id == 2) {
          $alumnos_escuela = Alumno_escuela::all();
        } else {
          $alumnos_escuela = Alumno_escuela::where('escuela_id', Auth::user()->escuela_id)->get();
        }        
        return view('alumnos.alumnos_lista')->with(['alumnos_escuela' => $alumnos_escuela]);
    }

    public function import_csv_file(Request $request){
       $this->validate($request,[
        'csv_file'=>'required',
      ]);
		Excel::load(Input::file('csv_file'), function($hoja){
			$hoja->each(function($fila){
				$alumno = new Alumno;
				$alumno->carnet = $fila->carnet;
				$alumno->nombre = $fila->nombre;
				$alumno->apellido = $fila->apellido;
				$alumno->direccion = $fila->direccion;
				$alumno->telefono = $fila->telefono;
				$alumno->correo = $fila->correo;
				$alumno->lugar_trabajo = $fila->lugar_trabajo;
				$alumno->telefono_trabajo = $fila->telefono_trabajo;
				Alumno::firstOrNew($alumno->toArray());
				$alumno = Alumno::where('carnet','=',$fila->carnet)->first();
				$escuela = new Escuela;
				$escuela = Escuela::where('codigo','=',$fila->codigo_escuela)->first(); //revisar
				$alumno_escuela = new Alumno_escuela;
				$alumno_escuela->alumno()->associate($alumno);
				$alumno_escuela->escuela()->associate($escuela);
				// $alumno_escuela->save();
				Alumno_escuela::firstOrNew(['alumno_id' => $alumno_escuela->alumno->id, 'escuela_id' => $alumno_escuela->escuela->id]);
				// Alumno::firstOrCreate($fila->toArray());
				// return $fila;
			});
		});
      session()->flash('mensaje', 'CSV cargado');
    	return redirect()->route('alumnoLista');
	}

   public function registroAlumno()
  {
    return view('alumnos.alumno_registro_manual');
  }

  public function guardarAlumno(Request $request)
  {
    //dd($request->all());
    $this->validate($request, [
        'carnet'=>'required|size:7',
        'nombre'=>'required',
        'apellido'=>'required',
        'correo'=>'email',
      ]);
    $alumno = new Alumno;
    $alumno->carnet = $request->carnet;
    $alumno->nombre = $request->nombre;
    $alumno->apellido = $request->apellido;
    $alumno->telefono = $request->telefono;
    $alumno->lugar_trabajo = $request->lugar_trabajo;
    $alumno->telefono_trabajo = $request->telefono_trabajo;
    $alumno->correo = $request->correo;
    $alumno->direccion = $request->direccion;

    if ((Alumno::where('carnet','=',$request->carnet)->first()) == null) {
      Alumno::firstOrCreate($alumno->toArray());
      $alumno = Alumno::where('carnet','=',$request->carnet)->first();
      $escuela = new Escuela;
      // $escuela->id = Auth::user()->escuela->id;
      $escuela = Escuela::where('id', Auth::user()->escuela_id)->first();
      Alumno_escuela::firstOrCreate(['alumno_id' => $alumno->id, 'escuela_id' => $escuela->id]);
      session()->flash('mensaje', 'Alumno ingresado con exito');
      return redirect()->route('alumnoLista') ;
    } else {
      session()->flash('advertencia', 'Alumno ya existe');
      return redirect()->route('alumnoNuevo') ;
    }

    // Alumno::firstOrCreate($alumno->toArray());
    // $alumno = Alumno::where('carnet','=',$request->carnet)->first();
    // $escuela = new Escuela;
    // // $escuela->id = Auth::user()->escuela->id;
    // $escuela = Escuela::where('id', Auth::user()->escuela_id)->first();
    // Alumno_escuela::firstOrCreate(['alumno_id' => $alumno->id, 'escuela_id' => $escuela->id]);
    // session()->flash('mensaje', 'Alumno ingresado con exito');
    // return redirect()->route('alumnoLista') ;
  }

  public function editarAlumno($id = 1)
  {
      $alumno = Alumno::find($id);
      return view('alumnos.alumno_editar')->with(['alumno' => $alumno]);
  }

  public function editarAlumnoGuardar(Request $request, $id){
    $alumno = Alumno::find($id);
    $alumno->carnet = $request->carnet;
    $alumno->nombre = $request->nombre;
    $alumno->apellido = $request->apellido;
    $alumno->telefono = $request->telefono;
    $alumno->lugar_trabajo = $request->lugar_trabajo;
    $alumno->telefono_trabajo = $request->telefono_trabajo;
    $alumno->correo = $request->correo;
    $alumno->direccion = $request->direccion;
    $alumno->update();
    session()->flash('mensaje', 'Alumno modificado corectamente');
   return redirect()->route('alumnoLista') ;
  }

    public function verAlumno($id)
  {
      $alumno = Alumno::find($id);
      return view('alumnos.alumno_ver')->with(['alumno' => $alumno]);
  }

}
