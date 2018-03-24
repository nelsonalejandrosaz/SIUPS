<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alumno_escuela;
use App\Expediente;
use App\Escuela;
use App\Expediente_servicio_social;
use App\ServicioSocial;
use Illuminate\Support\Facades\Auth;
use Input; 
use Response;
use Dompdf\Dompdf;
use PDF;
use DB;

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
  		$escuela = $request->get('escuela');
  		if ($escuela=='0')
  		{
  			$r = $request->get('anio');
  		// $alumno_escuela=Alumno_escuela::where('escuela_id',$escuela)->get();
 $reportAnioEscu = DB::table('expedientes')
            ->join('alumno_escuelas', 'expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos', 'alumnos.carnet', '=', 'alumno_escuelas.carnet')
            ->join('escuelas', 'escuelas.id', '=', 'alumno_escuelas.escuela_id')
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','escuelas.nombre as esnom')->whereYear('fecha_cierre',$r)->get();
  		}
  		else {
	$r = $request->get('anio');
  		// $alumno_escuela=Alumno_escuela::where('escuela_id',$escuela)->get();
 $reportAnioEscu = DB::table('expedientes')
            ->join('alumno_escuelas', 'expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos', 'alumnos.carnet', '=', 'alumno_escuelas.carnet')
            ->join('escuelas', 'escuelas.id', '=', 'alumno_escuelas.escuela_id')
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','escuelas.nombre as esnom' )->whereYear('fecha_cierre',$r)->where('escuelas.id',$escuela)->get();
}
 $escuelaNombre = Escuela::where('id', $escuela)->get();
//dd($escuelaNombre);		
	// return $request->get('anio');
  // 		dd($request->all());
 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');

 //$anioCierre = Expediente::whereYear('fecha_cierre', $r)->get();
//$escuela = Escuela::where('id', $esc)->get();

$anioCierre=Expediente::whereYear('fecha_cierre',$r)->get();

 $expediente_servicios= Expediente_servicio_social::all();
   
   $expediente= Expediente::all();
   $contador=1;  
     
//view()->share(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador','escuela','reportAnioEscu','escuelaNombre'));

$view = \View::make("reportes.reporteAlumnosAnio")->with(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador','escuela','reportAnioEscu','escuelaNombre'))->render();

         /*if($request->has('download')){
            // Set extra option
             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('reportes.reporteAlumnosAnio');
            // download pdf
             return $pdf->download('alumnos.pdf');
         }
        return view('reportes.reporteAlumnosAnio');*/

         $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($r.'_'.$escuela.'.pdf');
	}


		public function reporteDescargar(Request $request)
  	{
  		$escuela = $request->get('escuela');
  		if ($escuela=='0')
  		{
  			$r = $request->get('anio');
  		// $alumno_escuela=Alumno_escuela::where('escuela_id',$escuela)->get();
 $reportAnioEscu = DB::table('expedientes')
            ->join('alumno_escuelas', 'expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos', 'alumnos.carnet', '=', 'alumno_escuelas.carnet')
            ->join('escuelas', 'escuelas.id', '=', 'alumno_escuelas.escuela_id')
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','escuelas.nombre as esnom')->whereYear('fecha_cierre',$r)->get();
  		}
  		else {
	$r = $request->get('anio');
  		// $alumno_escuela=Alumno_escuela::where('escuela_id',$escuela)->get();
 $reportAnioEscu = DB::table('expedientes')
            ->join('alumno_escuelas', 'expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos', 'alumnos.carnet', '=', 'alumno_escuelas.carnet')
            ->join('escuelas', 'escuelas.id', '=', 'alumno_escuelas.escuela_id')
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','escuelas.nombre as esnom' )->whereYear('fecha_cierre',$r)->where('escuelas.id',$escuela)->get();
}
 $escuelaNombre = Escuela::where('id', $escuela)->get();

 $alumno_escuelas=Alumno_escuela::all();
 $anioo = date('Y');
 $mes = date('M');
 $dia = date('d');


$anioCierre=Expediente::whereYear('fecha_cierre',$r)->get();

   $contador=1;  
     
view()->share(compact('anioCierre','r', 'mes', 'dia', 'contador','escuela','reportAnioEscu','escuelaNombre'));

         
            // Set extra option
             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('reportes.reporteAlumnosAnio');
            // download pdf
             return $pdf->download('alumnos.pdf');
     
	}

  public function proyectosIndex()
  {
      return view('reportes.proyectosEjecucionIndex');
  }


  public function proyectos()
  {
    $user = Auth::user()->rol[0]->id;  
    if (Auth::user()->rol[0]->id == 2) 
      {
        $servicios_sociales = DB::table('servicio_social')
            ->join('municipios', 'servicio_social.municipio_id', '=', 'municipios.id')
            ->join('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')
            ->join('expediente_serviciosocials',  'expediente_serviciosocials.servicio_social_id','=','servicio_social.id')
            ->join('expedientes', 'expedientes.id', '=', 'expediente_serviciosocials.expediente_alumno_id')
            ->join('alumno_escuelas','expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos','alumno_escuelas.carnet','=','alumnos.carnet')

            ->where([
                ['servicio_social.modalidad_id',1],
                ['servicio_social.estado_id',2],
                
            ])
            ->select('servicio_social.nombre as ss_nombre','municipios.nombre as mun_nombre','departamentos.nombre as dep_nombre', 'servicio_social.beneficiarios_directos', 'servicio_social.fecha_ingreso', 'alumnos.nombre as alu_nombre', 'alumnos.apellido as alu_apellido')
            ->get();
      } else 
      {
        $servicios_sociales = DB::table('servicio_social')
            ->join('municipios', 'servicio_social.municipio_id', '=', 'municipios.id')
            ->join('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')
            ->join('expediente_serviciosocials',  'expediente_serviciosocials.servicio_social_id','=','servicio_social.id')
            ->join('expedientes', 'expedientes.id', '=', 'expediente_serviciosocials.expediente_alumno_id')
            ->join('alumno_escuelas','expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos','alumno_escuelas.carnet','=','alumnos.carnet')

            ->where([
                ['servicio_social.modalidad_id',1],
                ['servicio_social.estado_id',2],
                ['servicio_social.escuela_id', Auth::user()->escuela_id],
            ])
            ->select('servicio_social.nombre as ss_nombre','municipios.nombre as mun_nombre','departamentos.nombre as dep_nombre', 'servicio_social.beneficiarios_directos', 'servicio_social.fecha_ingreso', 'alumnos.nombre as alu_nombre', 'alumnos.apellido as alu_apellido')
            ->get();

      }
      




      //$servicios_sociales=ServicioSocial::where('estado_id',2)->unionAll($first)->get();
      $anio=date('Y');
      $view = \View::make("reportes.reporteProyectosEjecucion")->with(compact('servicios_sociales','user','anio'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('ProyectosEnEjecucion'.'.pdf');
  }

}
