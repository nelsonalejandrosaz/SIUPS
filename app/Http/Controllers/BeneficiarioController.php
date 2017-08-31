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
        'nombre' 		=> 'required',
        'apellido' 		=> 'required',
        'dui' 			=> 'required|min:9|max:10',
        'correo'		=> 'email|nullable',
        'correoOrganizacion' => 'email|nullable',
	    ]);
	    // Fin validacion
	    Beneficiario::create($request->only('nombre','apellido','dui','correo','telefono','organizacion','telefonoOrganizacion','correoOrganizacion','direccionOrganizacion'));
	    session()->flash('mensaje', 'Beneficiario ingresado con exito');
    	return redirect()->route('beneficiarioLista');
    }

    public function beneficiarioEditar($id = 1)
  	{
      $beneficiario = Beneficiario::find($id);
      return view('beneficiario.beneficiarioEditar')->with(['beneficiario' => $beneficiario]);
  	}

  	public function beneficiarioEditarPost(Request $request, $id)
  	{
      // Logica de validacion
      $this->validate($request, [
        'nombre'    => 'required',
        'apellido'    => 'required',
        'dui'       => 'required|min:9|max:10',
        'correo'    => 'email|nullable',
        'correoOrganizacion' => 'email|nullable',
      ]);
      // Fin validacion
    	$beneficiario = Beneficiario::find($id);
    	$beneficiario->nombre = $request->input('nombre');
    	$beneficiario->apellido = $request->input('apellido');
    	$beneficiario->dui = $request->input('dui');
    	$beneficiario->correo = $request->input('correo');
    	$beneficiario->telefono = $request->input('telefono');
    	$beneficiario->organizacion = $request->input('organizacion');
    	$beneficiario->telefonoorganizacion = $request->input('telefonoOrganizacion');
    	$beneficiario->correoOrganizacion = $request->input('correoOrganizacion');
    	$beneficiario->direccionOrganizacion = $request->input('direccionOrganizacion');
    	$beneficiario->save();
    	session()->flash('mensaje', 'Beneficiario modificado corectamente');
   		return redirect()->route('beneficiarioLista') ;
  	}

}
