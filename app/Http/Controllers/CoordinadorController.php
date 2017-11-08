<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno_escuela;
use App\ServicioSocial;
use Illuminate\Support\Facades\Auth;

class CoordinadorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('coordinador');
  }

  public function index()
  {
  	$escuelaId = Auth::user()->escuela_id;
	$ae = Alumno_escuela::where('escuela_id',$escuelaId)->get();
	$numeroAlumnos = sizeof($ae);
	$serviciosSociales = ServicioSocial::where('escuela_id',$escuelaId)->get();
	$numeroSS = sizeof($serviciosSociales);
	// dd($numeroAlumnos);
    return view('home/homeCoordinador')->with(['numeroAlumnos' => $numeroAlumnos])->with(['numeroSS' => $numeroSS]);
  }
}
