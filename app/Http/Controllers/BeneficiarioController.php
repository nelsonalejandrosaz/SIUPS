<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beneficiario;

class BeneficiarioController extends Controller
{
    //
     public function BeneficiarioLista(){
		$beneficiarios=Beneficiario::all();
		return view('beneficiario.beneficiarioLista')->with(['beneficiarios' => $beneficiarios]);
		}

	public function BeneficiarioNuevo(){
    	
    	return view ('beneficiario.beneficiarioNuevo');
    }
}
