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
    	
    	return view ('tutor.tutorAgregar');
    }



    public function guardarTutor(Request $request)
  	{
    $this->validate($request, [
        'dui'=>'required|size:10',
        'nombre'=>'required',
        'apellido'=>'required',
        'correo'=>'email',
        
      ]);

     if((Tutor::where('dui','=',$request->dui)->first()) == null)
     {
    $Tutor = Tutor::create([

    	'nombre' => $request->input('nombre'),
   		'apellido' => $request->input('apellido'),
    	'correo' => $request->input('correo'),
    	'dui' => $request->get('dui'),
    	'carnet'=>$request->get('carnet'),
    	]);
    return redirect()->route('TutorVer',['id'=>$Tutor->id]) ;
    }
    else { 
      //si ya existe muestra mensaje error 
      session()->flash('message.content', 'Dui de ese tutor ya existe, ingrese nuevo Tutor'); 
      return redirect()->route('agregarTutor') ;}
    }



     public function verTutor($id)
  	{
      $tutor = Tutor::find($id);
      return view('tutor.tutorVer')->with(['tutor' => $tutor]);
  	}



  	public function editarTutor($id = 1) //REVISAR?
  	{
      $tutor = Tutor::find($id);
      return view('tutor.tutorEditar')->with(['tutor' => $tutor]);
  	}


  	public function editarTutorGuardar(Request $request, $id)
  	{
       $this->validate($request, [
        'dui'=>'required|size:10',
        'nombre'=>'required',
        'apellido'=>'required',
        'correo'=>'email',
        ]);
        $tutor = Tutor::find($id);
        if((Tutor::where('dui','=',$request->dui)->first()) == null)
     {

    	$tutor = Tutor::find($id);
    	$tutor->nombre = $request->input('nombre');
    	$tutor->apellido = $request->input('apellido');
    	$tutor->correo = $request->input('correo');
    	$tutor->dui = $request->input('dui');
    	$tutor->carnet = $request->input('carnet');
    	$tutor->save();
    	
   		return redirect()->route('TutorVer',['id'=>$tutor->id]) ;
      session()->flash('mensaje', 'Tutor modificado corectamente');
    }
  	else { 
      //si ya existe muestra mensaje error 
      session()->flash('message.content', 'Dui de ese tutor ya existe, ingrese nuevo Tutor'); 
       return view('tutor.tutorEditar')->with(['tutor' => $tutor]);
     }
    }
}