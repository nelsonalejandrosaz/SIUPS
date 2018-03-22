<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;
use Illuminate\Support\Facades\Auth;
use App\Alumno_escuela;
use App\Expediente;
use App\Expediente_servicio_social;
use Input; 
use Response;
use Dompdf\Dompdf;
use PDF;
use DB;

class MemoriaCertificadoController extends Controller
{
    //

    public function certificadoMemoriaIndex()
    { //funcion para la memoria de los certificados
//obteniendo nombre de la escuela del usu autenticado
$escuelaUsu=Auth::user()->escuela_id;
$escu= Escuela::all();
foreach ($escu as $escu){
        $escuId=$escu->id; 
		if ($escuelaUsu == $escuId) {
        	 $nombreEscuelaUsu=$escu->nombre;
    }
 }//---//
    
    $escuelas = Escuela::all();

    	if (Auth::user()->rol[0]->nombre == 'jefe') {
            $alumnos_escuela = Alumno_escuela::all();  
            return view('memorias.certificadoMemoriaJefeIndex')->with(['escuelas' => $escuelas]);

        } else {
            $alumnos_escuela = Alumno_escuela::where('escuela_id',Auth::user()->escuela_id)->get();            
        }

        $escuelas = Escuela::all();
        return view('memorias.certificadoMemoriaIndex')->with(['escuelas' => $escuelas])->with(['nombreEscuelaUsu' =>$nombreEscuelaUsu]);
    }


    public function certificadoMemo(Request $request)
  	{
//obteniendo nombre de la escuela del usuario en sesion
$escuelaUsu=Auth::user()->escuela_id;
$escu= Escuela::all();
foreach ($escu as $escu){
        $escuId=$escu->id; 
		if ($escuelaUsu == $escuId) {
        	 $nombreEscuelaUsu1=$escu->nombre;
           $nombreEscuelaUsu = strtoupper($nombreEscuelaUsu1);
    }
 } //-----//

  				//$escuela = $request->get('escuela');
  		
	$r = $request->get('anio');

  		// $alumno_escuela=Alumno_escuela::where('escuela_id',$escuela)->get();
 $reportAnioEscu = DB::table('expedientes')
            ->join('alumno_escuelas', 'expedientes.alumno_escuela_id', '=', 'alumno_escuelas.id')
            ->join('alumnos', 'alumnos.carnet', '=', 'alumno_escuelas.carnet')
            ->join('escuelas', 'escuelas.id', '=', 'alumno_escuelas.escuela_id')
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','expedientes.certificado')->whereYear('fecha_cierre',$r)->where('escuelas.id',$escuelaUsu)->where('expedientes.certificado','=',1)->get();

   				//$escuelaNombre = Escuela::where('id', $escuela)->get();
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

$view = \View::make("memorias.certificadoMemoria")->with(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador','escuela','reportAnioEscu','escuelaNombre','nombreEscuelaUsu'))->render();

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
        return $pdf->stream($r.'_'.$r.'.pdf');
	}


public function certificadoMemoJefe(Request $request)
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
 ->select('alumnos.carnet','alumnos.nombre','alumnos.apellido','expedientes.fecha_cierre','escuelas.nombre as esnom','expedientes.certificado')->whereYear('fecha_cierre',$r)->where('expedientes.certificado','=',1)->get();
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

$view = \View::make("memorias.certificadoMemoriaJefe")->with(compact('alumno_escuelas', 'anioCierre','r', 'mes', 'dia', 'expediente_servicios','expediente', 'contador','escuela','reportAnioEscu','escuelaNombre'))->render();

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
        return $pdf->stream($r.'_'.$r.'.pdf');
	}

}
