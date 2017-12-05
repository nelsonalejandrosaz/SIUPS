<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Alumno_escuela;
use App\ServicioSocial;

class JefeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('jefe');
  }

  public function index()
  {
    $numeroExpNoAbierto = 0;
    $numeroExpCurso = 0;
    $numeroExpFinal = 0;
    $numeroSSDisponible = 0;
    $numeroSSEnCurso = 0;
    $numeroSSAbandonado = 0;
    $numeroSSFinal = 0;
  	$escuelaId = Auth::user()->escuela_id;
    $aes = Alumno_escuela::all();
    // dd($aes);
    foreach ($aes as $ae) {
      if ($ae->expediente->estado_expediente->id == 1) {
        $numeroExpNoAbierto++;
      }
      if ($ae->expediente->estado_expediente->id == 2) {
        $numeroExpCurso++;
      }
      if ($ae->expediente->estado_expediente->id == 3) {
        $numeroExpFinal++;
      }
    }
    $serviciosSociales = ServicioSocial::all();
    foreach ($serviciosSociales as $servicioSocial) {
      if ($servicioSocial->estado->id == 1) {
        $numeroSSDisponible++;
      }
      if ($servicioSocial->estado->id == 2) {
        $numeroSSEnCurso++;
      }
      if ($servicioSocial->estado->id == 3) {
        $numeroSSAbandonado++;
      }
      if ($servicioSocial->estado->id == 4) {
        $numeroSSFinal++;
      }
    }

    $numeroAlumnos = sizeof($aes);
    $estadisticas = new \stdClass();
    $estadisticas->numeroAlumnos = $numeroAlumnos;
    $estadisticas->numeroExpNoAbierto = $numeroExpNoAbierto;
    $estadisticas->numeroExpCurso = $numeroExpCurso;
    $estadisticas->numeroExpFinal = $numeroExpFinal;
    $estadisticas->numeroSSDisponible = $numeroSSDisponible;
    $estadisticas->numeroSSEnCurso = $numeroSSEnCurso;
    $estadisticas->numeroSSAbandonado = $numeroSSAbandonado;
    $estadisticas->numeroSSFinal = $numeroSSFinal;
    $estadisticas->numeroSS = sizeof($serviciosSociales);
    // dd($estadisticas);
    return view('home/homeCoordinador')->with(['estadisticas' => $estadisticas]);
  }
}
