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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ServicioSocialController extends Controller
{

   public function ServicioSocialLista()
    {
      //$SocialServicios = SocialServicio::all();
      $serviciossociales=ServicioSocial::all();
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
      ]);
    // $serviciosocial  = new SocialServicio ;
    // $serviciosocial->nombreSS = $request->nombreSS;
    //   $serviciosocial->inicioSS = $request->inicioSS;
    //     $serviciosocial->finSS = $request->finSS;
    //       $serviciosocial->beneficiarioSS = $request->horastSS;
    //         $serviciosocial->tutorSS = $request->horasaSS;

    ServicioSocial::create($request->only('nombre','tutor_id','beneficiario_id','municipio_id','fecha_ingreso','fecha_fin','monto','beneficiarios_directos','beneficiarios_indirectos','estado_id','horas_totales','numero_estudiantes','modalidad_id'));
    session()->flash('mensaje', 'Ingresado con exito');
    return redirect()->route('servicioSocialLista');

  }

  //Funcion para editar un servicio social 
   public function servicioSocialEditar($id)
    {
    $servicioSocial = ServicioSocial::find($id);
    $Beneficiarios = Beneficiario::all();
    $Tutors = Tutor::all();
    $departamentos = Departamento::all();
    $municipios = Municipio::all();
    $modalidades = Modalidad::all();
    return view('servicioSocial.servicioSocialEditar')->with(['servicioSocial' => $servicioSocial])->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios])->with(['modalidades'=>$modalidades]);

    }
    //funcion para ver un servicio social
     public function servicioSocialVer($id)
    {
    $servicioSocial = ServicioSocial::find($id);
    $Beneficiarios = Beneficiario::all();
    $Tutors = Tutor::all();
    $departamentos = Departamento::all();
    $municipios = Municipio::all();
      return view('servicioSocial.servicioSocialVer')->with(['servicioSocial' => $servicioSocial])->with(['Beneficiarios' => $Beneficiarios])->with(['Tutors' => $Tutors])->with(['departamentos' => $departamentos])->with(['municipios' => $municipios]);
    }

 }
