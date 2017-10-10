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
        'correo_organizacion' => 'email|nullable',
	    ]);
	    // Fin validacion
      // si el dui que estan metiendo no existe lo crea
      if((Beneficiario::where('dui','=',$request->dui)->first()) == null)
    {
	    $beneficiario=Beneficiario::create($request->only('nombre','apellido','dui','correo','telefono','organizacion','telefono_organizacion','correo_organizacion','direccion_organizacion'));
	    session()->flash('message.level', 'success');
      session()->flash('message.content', 'El beneficiario fue agregado con Exito');
    	return redirect()->route('beneficiarioVer',['id'=>$beneficiario->id]);
        }
    else { 
      //si ya existe muestra mensaje error 
      session()->flash('message.content', 'Dui de ese beneficiario ya existe'); 
      return redirect()->route('beneficiarioNuevo') ;}
    }


    public function beneficiarioEditar($id)
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
        'correo_organizacion' => 'email|nullable',
      ]);
      $beneficiario = Beneficiario::find($id);
      // Fin validacion
      if((Beneficiario::where('dui','=',$request->dui)->first()) == null||
        $beneficiario->dui == $request->dui )

    {
    	$beneficiario = Beneficiario::find($id);
    	$beneficiario->nombre = $request->input('nombre');
    	$beneficiario->apellido = $request->input('apellido');
    	$beneficiario->dui = $request->input('dui');
    	$beneficiario->correo = $request->input('correo');
    	$beneficiario->telefono = $request->input('telefono');
    	$beneficiario->organizacion = $request->input('organizacion');
    	$beneficiario->telefono_organizacion = $request->input('telefono_organizacion');
    	$beneficiario->correo_organizacion = $request->input('correo_organizacion');
    	$beneficiario->direccion_organizacion = $request->input('direccion_organizacion');
    	$beneficiario->save();
    	session()->flash('mensaje', 'Beneficiario modificado corectamente');
   		return redirect()->route('beneficiarioVer',['id' => $beneficiario->id]) ;
    }
    else { 
      //si ya existe muestra mensaje error 
      session()->flash('message.content', 'Dui de ese beneficiario ya existe, introduzca uno nuevo'); 
      return view('beneficiario.beneficiarioEditar')->with(['beneficiario' => $beneficiario]);
    }
  }


    public function beneficiarioVer($id)
    {
      $beneficiario = Beneficiario::find($id);
      return view('beneficiario.beneficiarioVer')->with(['beneficiario' => $beneficiario]);
    }

}
