<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alumno_escuela;
use App\Expediente;
use App\Expediente_servicio_social;

class ReporteController extends Controller
{
    //

    public function reporteIndex()
    {
       
        return view('reportes.reporteIndex');
    }

     public function pdfview(Request $request, $anio)
    {

       // $alumno_escuelas = DB::table("alumno_escuelas")->get();

 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

 $anio = Expediente::whereYear('fecha_cierre', $anio)->get();
// if($anio == null){
// Session::flash('mensaje', 'No existen registros de alumnos en ese anio.');
// return back();
// }
        
 $expediente_servicios= Expediente_servicio_social::all();
   
      $expediente= Expediente::all();
     
     

 view()->share(compact('alumno_escuelas', 'anio', 'mes', 'dia', 'expediente_servicios','expediente', ''));

         if($request->has('download')){
            // Set extra option
             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('reportes.reporteAlumnosAnio');
            // download pdf
             return $pdf->download('alumnos.pdf');
         }
        return view('reportes.reporteAlumnosAnio');
    }

}