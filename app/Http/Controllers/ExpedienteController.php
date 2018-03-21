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
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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
        // $this->sumarHorasExpediente();
        return view('expediente.expedienteLista')->with(['alumnos_escuela' =>$alumnos_escuela]);
    }
    
    public function ExpedienteVer($carnet, $escuela)
    {
      //validando que un coordinador no pueda entrar al expediente de otro alumno de otra escuela, solo de su escuela y el jefe que puede ver todos
      $expediente_servicios= Expediente_servicio_social::all();
      $ss= ServicioSocial::all();
      $expediente= Expediente::all();
      $tutor= Tutor::all();
      $estadoSS = Estado::all();
      $i=0;

      /* AGREGO PARA EL RECUENTO DE LAS HORAS*/

       $aes = Alumno_escuela::all();
        foreach ($aes as $ae) {
            $serviciosSociales = $ae->expediente->serviciossociales;
            
            $totalHoras = 0;
            foreach ($serviciosSociales as $servicioSocial) {
                $totalHoras = $totalHoras + $servicioSocial->horas_ganadas;
            }
        }
      /* FIN AGREGO PARA EL RECUENTO DE LAS HORAS*/

     if ( Auth::user()->rol[0]->nombre=='jefe') {
        $alumno_escuela=Alumno_escuela::where([['carnet',$carnet], ['escuela_id',$escuela]])->first();
    }
    else {
     $alumno_escuela=Alumno_escuela::where([['carnet',$carnet], ['escuela_id',Auth::user()->escuela_id]])->first();
 }

 $existe_escuela=isset($alumno_escuela);
        //dd($alumno_escuela);
 if ($existe_escuela)
 {
   $expe_ss=$alumno_escuela->expediente->serviciossociales;

   return view('expediente.expedienteVer')->with(['alumno_escuela' =>$alumno_escuela])->with(['ss' =>$ss])->with(['expediente_servicios' =>$expediente_servicios])->with(['expediente' =>$expediente])->with(['tutor' =>$tutor])->with(['estadoSS' =>$estadoSS])->with(['expe_ss' =>$expe_ss])->with(['totalHoras' =>$totalHoras]);
}
else{
    abort(403);
}




}

    public static function sumarHorasExpediente()
    {
        // $aes = Alumno_escuela::where('carnet',$carnet)->get();
        $aes = Alumno_escuela::all();
        $date = Carbon::now();

       
        // dd($aes);
        foreach ($aes as $ae) {
            $serviciosSociales = $ae->expediente->serviciossociales;
            $cantidadss = sizeof($serviciosSociales);
            if ($cantidadss > 0) {
              $ae->expediente->estado_expediente_id = 2;
            }
            // dd($ae->expediente);
            $totalHoras = 0;
            foreach ($serviciosSociales as $servicioSocial) {
                $totalHoras = $totalHoras + $servicioSocial->horas_ganadas;
            }
            $ae->expediente->totalHoras = $totalHoras;
            if ($totalHoras >= 500) {
              $ae->expediente->estado_expediente_id = 3;
            
              $ae->expediente->fecha_cierre = $date;
            }
            $ae->expediente->save();
        }
    }


     public function validarCertificado(Request $request){
      $c = $request->input('idexp');
      
      $expediente = Expediente::find($c);
      $expediente->certificado = 1;
      $expediente->save();


     
     // return redirect()->route('beneficiarioVer',['id' => $beneficiario->id]) ;

      return response()->json([
                    "success" => "true","msg"=>"Registro guardado correctamente"

        ]);

    }


  

}
