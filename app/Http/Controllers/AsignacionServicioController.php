<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use App\ServicioSocial;
use App\Tutor;
use App\Alumno_escuela;
use Illuminate\Support\Facades\Auth;
use App\Estado;
use App\Expediente_servicio_social;
use App\Http\Controllers\ExpedienteController;

class AsignacionServicioController extends Controller
{

    public function AsignacionServicio($id)
    {
        $servicioSocial = ServicioSocial::find($id);
        $alumnos_asignados = $servicioSocial->expediente_serviciosocials;
        $hayalumnos = isset($alumnos_asignados);
        $tutores = Tutor::all();
        $estados = Estado::all();
        $alumnos_escuela = Alumno_escuela::where('escuela_id', Auth::user()->escuela_id)->get();
        return view('asignar.servicioSocialAsignar')->with(['servicioSocial' => $servicioSocial])->with(['Tutors' => $tutores])->with(['alumnos_escuela' => $alumnos_escuela])->with(['estados' => $estados])->with(['alumnos_asignados' => $alumnos_asignados])->with(['hayalumnos' => $hayalumnos]);
    }

    public function AsignacionServicioPost(Request $request)
    {
        // Se busca es servicio social correspondiente
        $id = $request->id;
        $servicioSocial = ServicioSocial::find($id);
        // Se asigna el estado del servicio social y se persiste 
        $servicioSocial->estado_id = $request->input('estado_id');
        $servicioSocial->save();

        // Guardando las variables recibidas del request 
        $estudiantes = $request->input('estudiantes');
        $horas_ganadas = $request->input('horas_ganadas');
        $estado_ss_estudiante = $request->input('estado_ss_estudiante');

        // Obteniedo el tama;o del arreglo de estudiantes
        $maximo_estudiantes = sizeof($estudiantes);

        // Se recorre el arreglo de estudiantes y se guarda su respectiva instancia de relacion con el SS
        for ($i = 0; $i < $maximo_estudiantes; $i++) {
            // Se busca si existe ya el servicio social
            $expediente_servicio_social = Expediente_servicio_social::where([
                ['expediente_alumno_id', $estudiantes[$i]],
                ['servicio_social_id', $id],
            ])->first();
            // Se guarda en una variable si existe
            $existe = isset($expediente_servicio_social);
            // Si existen alumnos en ese servicio solo se actualizan los datos si no se crean sus relaciones
            if ($existe) {
                $expediente_servicio_social->horas_ganadas = $horas_ganadas[$i];
                $expediente_servicio_social->estado_ss_estudiante = $estado_ss_estudiante[$i];
                $expediente_servicio_social->save();
            } else {
                $expediente_servicio_social = Expediente_servicio_social::updateOrCreate([
                    'expediente_alumno_id' => $estudiantes[$i],
                    'servicio_social_id' => $id,
                    'horas_ganadas' => $horas_ganadas[$i],
                    'estado_ss_estudiante' => $estado_ss_estudiante[$i],
                ]);
            }
        }
        ExpedienteController::sumarHorasExpediente();
        session()->flash('mensaje.tipo', 'success');
        session()->flash('mensaje.icono', 'fa-check');
        session()->flash('mensaje.titulo', 'Exito');
        session()->flash('mensaje.contenido', 'Datos guardados correctamente');
        return redirect()->route('asignacionServicio', ['id' => $id]);
    }

    public function AsignacionServicioEliminar(Request $request)
    {
        $expss = Expediente_servicio_social::find($request->id);
        $id = $expss->ssexp->id;
        $expss->delete();
        session()->flash('mensaje.tipo', 'success');
        session()->flash('mensaje.icono', 'fa-check');
        session()->flash('mensaje.titulo', 'Exito');
        session()->flash('mensaje.contenido', 'El alumno fue eliminado del Servicio Social');
        return redirect()->route('asignacionServicio', ['id' => $id]);
    }


}
