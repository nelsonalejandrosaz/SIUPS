<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicioSocial;
use App\Tutor;
use App\Alumno_escuela;
use Illuminate\Support\Facades\Auth;
use App\Estado;

class AsignacionServicioController extends Controller
{
    //

     public function AsignacionServicio()
    {
        $servicioSocial = ServicioSocial::find(1);
        $tutores = Tutor::all();
        $estados = Estado::all();
        $alumnos_escuela = Alumno_escuela::where('escuela_id', Auth::user()->escuela_id)->get();  
        return view('asignar.servicioSocialAsignar')->with(['servicioSocial' => $servicioSocial])->with(['Tutors' => $tutores])->with(['alumnos_escuela' => $alumnos_escuela])->with(['estados'=>$estados]);
    }
}
