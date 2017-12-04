<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alumno_escuela;
use App\Expediente;
use App\Escuela;
use App\Expediente_servicio_social;
use Input; 
use Response;
use Dompdf\Dompdf;
use PDF;

class ReporteController extends Controller
{
    //

    public function reporteIndex()
    {
        $escuelas = Escuela::all();
        return view('reportes.reporteIndex')->with(['escuelas' => $escuelas]);
    }

     public function pdfview(Request $request, $anio)
    {

       // $alumno_escuelas = DB::table("alumno_escuelas")->get();
//$a = Input::get('anio');
//return Response($anio);
 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

 $anioCierre = Expediente::whereYear('fecha_cierre', $anio)->get();
// if($anio == null){
// Session::flash('mensaje', 'No existen registros de alumnos en ese anio.');
// return back();
// }
        
 $expediente_servicios= Expediente_servicio_social::all();
   
   $expediente= Expediente::all();
   $contador=1;  
     

 view()->share(compact('alumno_escuelas', 'anioCierre','anio', 'mes', 'dia', 'expediente_servicios','expediente', 'contador'));

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


     public function pdfdescargar($anio, Request $request)
    {
      $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

   $contador=1; 
 $anio = Expediente::whereYear('fecha_cierre', $anio)->get();    
 $expediente_servicios= Expediente_servicio_social::all();
   
      $expediente= Expediente::all();
view()->share(compact('alumno_escuelas', 'anio', 'mes', 'dia', 'expediente_servicios','expediente', 'contador'));

             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('reportes.reporteAlumnosAnio');
            // download pdf
             return $pdf->download('alumnos.pdf');
  	}

  	public function reporte(Request $request)
  	{
  		$r = $request->get('anio');
		// return $request->get('anio');
  // 		dd($request->all());
    
 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

 $anioCierre = Expediente::whereYear('fecha_cierre', $r)->get();
 $expediente_servicios= Expediente_servicio_social::all();
   
   $expediente= Expediente::all();
   $contador=1;  
     
view()->share(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador'));

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


		public function reporteDescargar(Request $request)
  	{
  		$r = $request->get('anio');
		// return $request->get('anio');
  // 		dd($request->all());
    
 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

 $anioCierre = Expediente::whereYear('fecha_cierre', $r)->get();
 $expediente_servicios= Expediente_servicio_social::all();
   
   $expediente= Expediente::all();
   $contador=1;  
     
view()->share(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador'));

         
            // Set extra option
             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('reportes.reporteAlumnosAnio');
            // download pdf
             return $pdf->download('alumnos.pdf');
     
	}

}
