@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.alumnoslista') }}
@endsection

@section('contentheader_title', 'Lista de alumnos')
@section('contentheader_description', '')


@section('main-content')

@if(session()->has('mensaje'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Exito</h4>
      {{ session()->get('mensaje') }}
    </div>
  @endif
 
	<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de alumnos</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaAlumnos" class="table table-hover">
            <thead>
              <tr>
                <th>Carnet</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Escuela</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              @foreach($alumnos_escuela as $alumno_escuela)
              <tr>
              <td>{{$alumno_escuela->alumno->carnet}}</td>
              <td>{{$alumno_escuela->alumno->apellido}}</td>
              <td>{{$alumno_escuela->alumno->nombre}}</td>
              <td>{{$alumno_escuela->escuela->nombre}}</td>
              <td align="center">
                @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                <a href="{{ route('alumnoEditar', ['id' => $alumno_escuela->alumno->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                @endif  
                <a href="{{ route('alumnoVer', ['id' => $alumno_escuela->alumno->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a>
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

  <!-- <script>
    $(document).ready(function(){
    $('#tablaAlumnos').DataTable();
    });
  </script> -->

@endsection

@section('JSExtras')
<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
  $("#tablaAlumnos").DataTable(
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
