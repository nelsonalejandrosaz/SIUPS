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

    public function BeneficiarioNuevoPost(Request $request){
    	// Logica de validacion
    	$this->validate($request, [
        'nombre' 		=> 'required|unique:posts|max:255',
        'apellido' 		=> 'required',
        'dui' 			=> 'required|min:9|max:10',
        'correo'		=> 'email',
        'correoOrganizacion' => 'email',
	    ]);
	    // Fin validacion
	    Beneficiario::create($request->only('nombre','apellido','dui','correo','telefono','organizacion','telefonoOrganizacion','correoOrganizacion','direccionOrganizacion'));
	    session()->flash('mensaje', 'Beneficiario ingresado con exito');
    	return redirect()->route('beneficiarioLista');
    }
}
