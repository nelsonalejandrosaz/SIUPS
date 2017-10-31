@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
	Expediente de {{$alumno_escuela->alumno->nombre}} {{$alumno_escuela->alumno->apellido}}
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Expediente de {{$alumno_escuela->alumno->nombre}} {{$alumno_escuela->alumno->apellido}}
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')
 
@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div style="text-align:center">
          <h2 class="">Hoja de Expediente</h2>
          <h4>Universidad de El Salvador</h4>
          <h4>Facultad de Ingenieria y Arquitectura</h4>
          <h4>Escuela de ingenieria de {{ $alumno_escuela->escuela->nombre }}</h4>
          <h4>Subunidad de proyeccion Social</h4>
          <br>
          <h4>Resumen de Servicio Social Desarrollado</h4>
        <br>
        </div>
        <table class="table">
          <tr>
            <th>Datos de alumno</th>
            <th></th>
          </tr>
          <tr>
            <td>Nombre: {{ $alumno_escuela->alumno->apellido }}, {{ $alumno_escuela->alumno->nombre }}</td>
            <td>Carnet: {{ $alumno_escuela->carnet }}</td>
          </tr>
          <tr>
            <td>Direccion: {{ $alumno_escuela->alumno->direccion }}</td>
            <td>Telefono personal: {{ $alumno_escuela->alumno->telefono }}</td>
          </tr>
          <tr>
            <td>Correo electronico: {{ $alumno_escuela->alumno->correo }}</td>
            <td></td>
          </tr>
            <td>Lugar de trabajo: {{ $alumno_escuela->alumno->lugar_trabajo }}</td>
            <td>Telefono de trabajo: {{ $alumno_escuela->alumno->telefono_trabajo }}</td>
        </table>
        <br>
        <table class="table table-bordered table-hover">
          <tr>
            <th style="width: 5%" rowspan="2">No</th>
            <th style="width: 20%" rowspan="2">Servicio Social</th>
            <th style="width: 15%" rowspan="2">Tutor</th>
            <th style="width: 20%" colspan="2">Fecha</th>
            <th style="width: 10%" rowspan="2">Horas asignadas</th>
            <th style="width: 10%" rowspan="2">Monto</th>
            <th style="width: 10%" colspan="2">Beneficiarios</th>
            <th style="width: 10%" rowspan="2">Estado</th>
          </tr>
          <tr>
            <th>Inicio</th>
            <th>Finalizacion</th>
            <th>Directos</th>
            <th>Indirectos</th>
          </tr>
          <tr>
            <th>1</th>
            <th>
               @foreach($ServicioSocial as $serviciosocial)
              
              @endforeach
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>2</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>3</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </table>
        <div>
          <br>
          <h4>Observaciones:</h4>
          <p>{{ $alumno_escuela->expediente->observaciones }}</p>
        </div>
      </div><!-- /.box-header -->
      
    </div><!-- /.box -->
  </div>
</div>

@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')

@endsection
