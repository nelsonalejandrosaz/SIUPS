<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServicioSocial;
use App\Beneficiario;
use App\Tutor;
use App\Departamento;
use App\Municipio;
use App\Modalidad;
use App\Estado;
use App\Escuela;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ServicioSocialController extends Controller
{

 public function ServiciosDisponibles()
 {
   $serviciossociales = ServicioSocial::all();
     //return view('serviciosocial.servicioSocialLista')-with(['SocialServicios' => $SocialServicios]);
   return view('serviciosDisponibles.serviciosDisponibles')->with(['serviciossociales' => $serviciossociales]);;

 }

 public function serviciosDisponiblesVer($id)
 {
  $servicioSocial = ServicioSocial::find($id);
  $Beneficiarios = Beneficiario::all();
  $Tutors = Tutor::all();
  $estados = Estado::all();
  $departamentos = Departamento::all();
  $municipios = Municipio::all();
  $modalidades = Modalidad::all();
  return view('serviciosDisponibles.serviciosDisponiblesVer')->with(['servicioSocial' => $servicioSocial])->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios])->with(['modalidades'=>$modalidades])->with(['estados'=>$estados]);
}

public function ServicioSocialLista()
{
 if (Auth::user()->rol[0]->id == 2) {
  $serviciossociales = ServicioSocial::all();
} else {
  $serviciossociales = ServicioSocial::where('escuela_id', Auth::user()->escuela_id)->get();
}
     //return view('serviciosocial.servicioSocialLista')-with(['SocialServicios' => $SocialServicios]);
return view('serviciosocial.servicioSocialLista')->with(['serviciossociales' => $serviciossociales]);;

}



public function ServicioSocialRegistro()
{
  $Beneficiarios = Beneficiario::all();
  $Tutors = Tutor::all();
  $departamentos = Departamento::all();
  $municipios = Municipio::all();
  $modalidades = Modalidad::all();
  return view('serviciosocial.servicioSocialRegistro')->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios])->with(['modalidades' => $modalidades]);

}

public function ServicioSocialGuardar(Request $request){

  $this->validate($request, [
    'nombre'=>'required',
    'fecha_ingreso'=>'required',
    'numero_estudiantes'=>'required|numeric',
    'beneficiario_id'=>'required',
    'modalidad_id' =>'required',
    'municipio_id'=>'required',
  ],['beneficiario_id.required'=>'Beneficiario es obligatorio']);
    // $serviciosocial  = new SocialServicio ;
    // $serviciosocial->nombreSS = $request->nombreSS;
    //   $serviciosocial->inicioSS = $request->inicioSS;
    //     $serviciosocial->finSS = $request->finSS;
    //       $serviciosocial->beneficiarioSS = $request->horastSS;
    //         $serviciosocial->tutorSS = $request->horasaSS;

  $ServicioSocial = ServicioSocial::create([
    //Validacion de que la fecha final no sea mayor a 18 meses y si es mayor
    //el estado del SS cambia de estado a abandonado

    'nombre' =>$request->input('nombre'),
    'descripcion' => $request->input('descripcion'),
    'escuela_id' => Auth::user()->escuela_id,
    'tutor_id' => $request->input('tutor_id'),
    'beneficiario_id' => $request->input('beneficiario_id'),
    'municipio_id' => $request->input('municipio_id'),
    'fecha_ingreso' => $request->input('fecha_ingreso'),
    'fecha_fin' => $request->input('fecha_fin'),
    'monto' => $request->input('monto'),
    'beneficiarios_directos' => $request->input('beneficiarios_directos'),
    'beneficiarios_indirectos' => $request->input('beneficiarios_indirectos'),
    'estado_id' => $request->input('estado_id'),
    'horas_totales' => $request->input('horas_totales'),
    'numero_estudiantes' => $request->input('numero_estudiantes'),
    'modalidad_id' => $request->input('modalidad_id'),
    'ingresadoPor' => Auth::user()->email,
  ]);

  // Se muestra el mensaje de ingreso correcto
  session()->flash('mensaje.tipo', 'success');
  session()->flash('mensaje.icono', 'fa-check');
  session()->flash('mensaje.titulo', 'Exito');
  session()->flash('mensaje.contenido', 'Servicio Social ingresado correctamente');
  return redirect()->route('servicioSocialVer',['id' => $ServicioSocial->id]);
}

  //Funcion para editar un servicio social
public function ServicioSocialEditar($id)
{
  $servicioSocial = ServicioSocial::find($id);
  if ( Auth::user()->escuela_id == $servicioSocial->escuela->id ) {
    $Beneficiarios = Beneficiario::all();
    $Tutors = Tutor::all();
    $estados = Estado::all();
    $departamentos = Departamento::all();
    $municipios = Municipio::where('departamento_id',$servicioSocial->municipio->departamento_id)->get();
    $modalidades = Modalidad::all();
    return view('serviciosocial.servicioSocialEditar')->with(['servicioSocial' => $servicioSocial])->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios])->with(['modalidades'=>$modalidades])->with(['estados'=>$estados]);
  }
  return redirect()->route('permisoDenegado');
}
    //funcion Post para editar al servicio social
public function ServicioSocialEditarPost(Request $request, $id)
{
      // Logica de validacion
  $this->validate($request, [
    'nombre'=>'required',
    'fecha_ingreso'=>'required',
    'numero_estudiantes'=>'required|numeric',
  ]);
      // Fin validacion
  $servicioSocial = ServicioSocial::find($id);
  $servicioSocial->nombre = $request->input('nombre');
  $servicioSocial->descripcion = $request->input('descripcion');
  $servicioSocial->tutor_id = $request->input('tutor_id');
  $servicioSocial->beneficiario_id = $request->input('beneficiario_id');
  $servicioSocial->municipio_id = $request->input('municipio_id');
  $servicioSocial->fecha_ingreso = $request->input('fecha_ingreso');
  $servicioSocial->fecha_fin = $request->input('fecha_fin');
  $servicioSocial->monto = $request->input('monto');
  $servicioSocial->beneficiarios_directos = $request->input('beneficiarios_directos');
  $servicioSocial->beneficiarios_indirectos = $request->input('beneficiarios_indirectos');
  $servicioSocial->estado_id = $request->input('estado_id');
  $servicioSocial->horas_totales = $request->input('horas_totales');
  $servicioSocial->numero_estudiantes = $request->input('numero_estudiantes');
  $servicioSocial->modalidad_id = $request->input('modalidad_id');
  $servicioSocial->modificadoPor = Auth::user()->email;
  // dd(Auth::user()->email);

  $fechaahora = Carbon::Now();
  $fechainicioSS = Carbon::Now();
  $fechainicioSS = $servicioSocial->fecha_ingreso;
  $final = Carbon::Parse($fechainicioSS)->addMonths(18);

  if(empty($servicioSocial->fecha_fin)==true)
  {
    if($fechaahora >= $final )
    {
      $servicioSocial->estado_id = 3;
      $servicioSocial->save();
    }else {
      $servicioSocial->estado_id = 2;
      $servicioSocial->save();
    }

  }else{
      $fechacolocada = Carbon::Now();
      $fechainicioSS = Carbon::Now();
      $fechacolocada = $servicioSocial->fecha_fin = $request->input('fecha_fin');
      $fechainicioSS = $servicioSocial->fecha_ingreso;
      $final = Carbon::Parse($fechainicioSS)->addMonths(18);
      if($fechacolocada >= $final){
        session()->flash('mensaje.contenido', 'Fecha limite de SS es entre 3 y 18 meses');

      }
      else {
        $servicioSocial->save();
      }
    }
    // Se muestra el mensaje de ingreso correcto
    session()->flash('mensaje.tipo', 'success');
    session()->flash('mensaje.icono', 'fa-check');
    session()->flash('mensaje.titulo', 'Exito');
    session()->flash('mensaje.contenido', 'Servicio Social modificado correctamente');
    return redirect()->route('servicioSocialVer',['id' => $servicioSocial->id]);
  }



    //funcion para ver un servicio social
public function servicioSocialVer($id)
{
 $servicioSocial = ServicioSocial::find($id);
 if ( Auth::user()->escuela_id == $servicioSocial->escuela->id || Auth::user()->rol[0]->nombre=='jefe') {
  $Beneficiarios = Beneficiario::all();
  $Tutors = Tutor::all();
  $estados = Estado::all();
  $departamentos = Departamento::all();
  $municipios = Municipio::all();
  $modalidades = Modalidad::all();
  return view('serviciosocial.servicioSocialVer')->with(['servicioSocial' => $servicioSocial])->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios])->with(['modalidades'=>$modalidades])->with(['estados'=>$estados]);
}
return redirect()->route('permisoDenegado');
}

public function municipiosPorDepartamento($id)
{
  $municipios = Municipio::where('departamento_id',$id)->get();
  return \Response::json($municipios);
}

}
