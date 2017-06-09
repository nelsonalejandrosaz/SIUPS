<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno_escuela;
use App\Alumno;
use App\Escuela;
use Excel;
use Illuminate\Support\Facades\Input;

class AlumnoController extends Controller
{

    public function AlumnosLista($exito = 0)
    {
        $alumnos_escuela = Alumno_escuela::all();
        return view('alumnos.alumnos_lista')->with(['alumnos_escuela' => $alumnos_escuela])->with(['exito' => $exito]);
    }

    public function import_csv_file(Request $request){
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
				Alumno::firstOrCreate($alumno->toArray());
				$alumno = Alumno::where('carnet','=',$fila->carnet)->first();
				$escuela = new Escuela;
				$escuela = Escuela::where('codigo','=',$fila->codigo_escuela)->first(); //revisar
				$alumno_escuela = new Alumno_escuela;
				$alumno_escuela->alumno()->associate($alumno);
				$alumno_escuela->escuela()->associate($escuela);
				// $alumno_escuela->save();
				Alumno_escuela::firstOrCreate(['alumno_id' => $alumno_escuela->alumno->id, 'escuela_id' => $alumno_escuela->escuela->id]);
				// Alumno::firstOrCreate($fila->toArray());
				// return $fila;
			});
		});
    	return redirect('alumnos_lista/1');
	}

   public function registroAlumno()
  {
    return view('alumnos.alumno_registro_manual');
  }

  public function guardarAlumno(Request $request)
  {
    //dd($request->all());

    $alumno = new Alumno;
    $alumno->carnet = $request->carnet;
    $alumno->nombre = $request->nombre;
    $alumno->apellido = $request->apellido;
    $alumno->telefono = $request->telefono;
    $alumno->lugar_trabajo = $request->lugar_trabajo;
    $alumno->telefono_trabajo = $request->telefono_trabajo;
    $alumno->correo = $request->correo;
    $alumno->direccion = $request->direccion;


    Alumno::firstOrCreate($alumno->toArray());
    $alumno = Alumno::where('carnet','=',$request->carnet)->first();

    $escuela = new Escuela;
    $escuela = Escuela::where('codigo','=','SI')->first();

    Alumno_escuela::firstOrCreate(['alumno_id' => $alumno->id, 'escuela_id' => $escuela->id]);

    return redirect('alumnos_lista/1') ;
  }
}
