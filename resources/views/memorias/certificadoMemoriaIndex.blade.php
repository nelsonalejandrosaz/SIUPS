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

 <form  method="POST" target="_blank">
      {{ csrf_field() }} 
      <div class="col-xs-10">
       <div class="panel panel-success">
        <div class="panel-heading">Reporte de Certificados Emitidos </div> 
        <div class="panel-body">

            Certificados Emitidos en el Año: <br><br>
            <label>Año: *</label>
            <input   placeholder="Ingrese un año" type="number" id="anio" name="anio" title="Ingrese un año"   size="40" required>
            <br><br>

        {{$nombreEscuelaUsu}} 
           

<br><br>
             


<table width="300">

  <tr>
            <td width="150">  <button formaction="{{ route('certificadoMemo') }}" type="submit" class="btn btn-block btn-primary btn-xs"  style='width:100px; height:40px' target="_blank">Ver Memoria</button> </td>
            <td width="150">
          <button formaction="{{ route('reporteDescargar') }}" type="submit" class="btn btn-block btn-success btn-xs" id="download" name="download" target="_blank" style='width:100px; height:40px'>Descargar</button> 
          </td></tr>
          </table>
          <br><br>


<!-- </div> -->
</div>
</div>

        </div><!-- /.box-body -->


  </form> 
      </div><!-- /.box -->

   
    </div>
  </div>

@endsection

@section('JSExtras')
$(document).ready(function() {
    $('#btn_anio').click(function(){
        window.location = $(this).val();
    });
});
@endsection

