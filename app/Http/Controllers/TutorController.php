<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tutor;

class TutorController extends Controller
{
   public function TutoresLista(){
		$tutores=Tutor::all();
		return view('tutor.tutoresLista')->with(['tutores' => $tutores]);
	}



    public function AgregarTutor(){
    	
    	return view ('tutor.AgregarTutor');
    }



    public function guardarTutor(Request $request)
  	{
    $this->validate($request, [
        'dui'=>'required|max:10',
        'nombre'=>'required',
        'apellido'=>'required',
        'correo'=>'email',
        
      ]);
    $Tutor = Tutor::create([

    	'nombre' => $request->input('nombre'),
   		'apellido' => $request->input('apellido'),
    	'correo' => $request->input('correo'),
    	'dui' => $request->get('dui'),
    	'carnet'=>$request->get('carnet'),
    	]);
    return redirect()->route('tutoresLista') ;
    }



     public function verTutor($id)
  	{
      $tutor = Tutor::find($id);
      return view('tutor.tutorver')->with(['tutor' => $tutor]);
  	}



  	public function editarTutor($id = 1)
  	{
      $tutor = Tutor::find($id);
      return view('tutor.tutorEditar')->with(['tutor' => $tutor]);
  	}


  	public function editarTutorGuardar(Request $request, $id)
  	{
    	$tutor = Tutor::find($id);
    	$tutor->nombre = $request->input('nombre');
    	$tutor->apellido = $request->input('apellido');
    	$tutor->email = $request->input('correo');
    	$tutor->dui = $request->input('dui');
    	$tutor->carnet = $request->input('carnet');
    	$tutor->save();
    	session()->flash('mensaje', 'Tutor modificado corectamente');
   		return redirect()->route('tutoresLista') ;
  	}
}
