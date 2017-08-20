<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rol;
use App\Escuela;
use App\User;
class UsuarioController extends Controller
{


	public function UsuariosLista(){
		$usuarios=User::all();
		return view('usuarios.usuariosLista')->with(['usuarios' => $usuarios]);
	}



    public function AgregarUsuario(){
    	$rols=Rol::all();
    	$escuelas=Escuela::all();
    	return view ('usuarios.AgregarUsuario',compact('rols','escuelas'));
    }



    public function guardarUsuario(Request $request)
  	{
    $this->validate($request, [
        'username'=>'required|max:10',
        'nombre'=>'required',
        'apellido'=>'required',
        'correo'=>'email',
        
      ]);
    $User = User::create([

    	'username'=> $request->input('username'),
    	'name' => $request->input('nombre'),
   		'apellido' => $request->input('apellido'),
    	'email' => $request->input('correo'),
    	'rol_id' => $request->get('rol'),
    	'escuela'=>$request->get('escuela'),
    	'password' => bcrypt($request->input('password')),

    	]);
    return redirect()->route('usuariosLista') ;
    }

     public function verUsuario($id)
  {
      $usuario = User::find($id);
      return view('usuarios.usuarioVer')->with(['usuario' => $usuario]);
  }

  public function editarUsuario($id = 1)
  {
      $usuario = User::find($id);
      return view('usuarios.usuarioEditar')->with(['usuario' => $usuario]);
  }

  public function editarUsuarioGuardar(Request $request, $id){
    $usuario = User::find($id);
    $usuario->username = $request->input('username');
    $usuario->name = $request->input('nombre');
    $usuario->apellido = $request->input('apellido');
    $usuario->email = $request->input('correo');
    $usuario->password = bcrypt($request->input('password'));
    $usuario->save();
    session()->flash('mensaje', 'Usuario modificado corectamente');
   return redirect()->route('usuariosLista') ;
  }
}
