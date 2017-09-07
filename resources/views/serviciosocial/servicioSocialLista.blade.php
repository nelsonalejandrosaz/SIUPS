extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.beneiciarioslista') }}
@endsection

@section('contentheader_title', 'Lista de beneficiarios')
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
          <h3 class="box-title">Lista de Servicio Social</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaServicioSocial" class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>inicioSS</th>
                <th>finSS</th>
                <th>horas Totales </th>
                <th>Horas del alumno</th>
                <th>Beneficiario</th>
                <th>Tutor</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
             @foreach($serviciosocials as $serviciosocial)
              <tr>
              <td>{{$serviciosocial->nombre}}</td>
              <td>{{$serviciosocial->inicioSS}}</td>
              <td>{{$serviciosocial->finSS}}</td>
              <td>{{$serviciosocial->horastSS}}</td>
              <td>{{$serviciosocial->horasaSS}}</td>
              <td>{{$serviciosocial->beneficiarioSS}}</td>
              <td>{{$serviciosocial->tutorSS}}</td>
            <!--  <td align="center">
                @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                <a href="{{ route('beneficiarioEditar', ['id' => $beneficiario->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                @endif
                <a href="{{ route('beneficiarioVer', ['id' => $beneficiario->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a>
              </td>-->
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
  $("#tablaServicioSocial").DataTable(
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
