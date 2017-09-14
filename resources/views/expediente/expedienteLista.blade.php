@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
  Lista de expedientes
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Lista de expedientes
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
          <h3 class="box-title">Expedientes</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaBeneficiarios" class="table table-hover">
            <thead>
              <tr>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
             @foreach($alumnos_escuela as $alumno_escuela)
              <tr>
              <td>{{$alumno_escuela->carnet}}</td>
              <td>{{$alumno_escuela->alumno->nombre}}</td>
              <td>{{$alumno_escuela->alumno->apellido}}</td>
              <td>{{$alumno_escuela->expediente->estado_expediente->nombre}}</td>
              <td>{{$alumno_escuela->expediente->observaciones}}</td>
              <td align="center">
                <a href="{{ route('expedienteVer', ['carnet' => $alumno_escuela->carnet]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a> 
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

@endsection

@section('JSExtras')
<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
  $("#tablaBeneficiarios").DataTable(
  {
    language: {
    processing:     "Procesando...",
    search:         "Buscar:",
    lengthMenu:     "Mostrar _MENU_ registros",
    info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
    infoFiltered:   "(filtrado de un total de _MAX_ registros)",
    infoPostFix:    "",
    loadingRecords: "Cargando...",
    zeroRecords:    "No se encontraron resultados",
    emptyTable:     "Ningún dato disponible en esta tabla",
    paginate: {
      first:      "Primero",
      previous:   "Anterior",
      next:       "Siguiente",
      last:       "Último"
    },
    aria: {
      sortAscending:  ": Activar para ordenar la columna de manera ascendente",
      sortDescending: ": Activar para ordenar la columna de manera descendente"
    }
    }
  } 
  );
});
</script>
@endsection