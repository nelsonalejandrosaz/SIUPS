<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicioSocialController extends Controller
{
    public function IngresarServicioSocial(){
    	return view ('serviciosocial.registro_servicio_social');
    }
}
