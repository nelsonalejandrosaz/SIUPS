@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
 Reporte
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Reporte
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')
 
@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertamensajes')
 
	<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

         <!-- <div class="container" style="margin-top:30px;"> -->
    <div class="row well">
   
       
      <div class="col-xs-10">
       <div class="panel panel-success">
        <div class="panel-heading">GENERAR REPORTE </div> 
        <div class="panel-body">

            Ingrese el año en que desea obtener reporte de alumnos que realizaron su Servicio Social <br>
            <input   type="number"  title="Ingrese un año"  id="degradacionSeleccionada" size="40" >

<!-- </div> -->
</div>
</div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

@endsection

