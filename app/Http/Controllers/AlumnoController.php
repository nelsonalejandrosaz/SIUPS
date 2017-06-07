<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use Excel;
use Illuminate\Support\Facades\Input;

class AlumnoController extends Controller
{

    public function alumnos_lista()
    {
        $alumnos = Alumno::all();
        return view('alumnos.alumnos_lista')->with(['alumnos' => $alumnos]);
    }

    public function import_csv_file(){
		Excel::load(Input::file('csv_file'), function($reader){
			$reader->each(function($sheet){
				Alumno::firstOrCreate($sheet->toArray());
				return $sheet;
			});
		});
	}
}
