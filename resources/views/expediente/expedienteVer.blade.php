@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
	Expediente de {{$alumno_escuela}}
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Expediente de {{$alumno_escuela->alumno->nombre}}
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
        <h2 class="box-title">Hoja de Expediente</h2>
        <h4>Universidad de El Salvador</h4>
        <h4>Facultad de Ingenieria y Arquitectura</h4>
        <h4>Escuela de ingenierias de [escuela]</h4>
        <h4>Subunidad de proyeccion Social</h4>
        <br>
        <h4>Resumen de Servicio Social Desarrollado</h4>
        <br>
        <h5>Datos de inscripcion</h5>
        <p>Alumno</p>
        <p>Carnet</p>
        <p>Direccion</p>
        <p>Telefono</p>
        <p>Correo Electronico</p>
      </div><!-- /.box-header -->
      
    </div><!-- /.box -->
  </div>
</div>

@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')

@endsection
