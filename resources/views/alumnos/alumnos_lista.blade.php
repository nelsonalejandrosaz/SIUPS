@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Lista de alumnos')
@section('contentheader_description', '')


@section('main-content')

  @if($exito == 1)
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> ¡Exelente!</h4>
      Los datos se han cargado con exito.
    </div>
  @endif

	<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Lista de alumnos</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" id="busqueda" name="table_search" class="form-control input-sm pull-right" placeholder="Carnet" onkeyup="buscarCarnet()">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="tablaAlumnos">
                    <tr>
                      <th>Carnet</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Escuela</th>
                      <th>Accion</th>
                    </tr>
                    @foreach($alumnos_escuela as $alumno_escuela)
                    <tr>
                      <td>{{$alumno_escuela->alumno->carnet}}</td>
                      <td>{{$alumno_escuela->alumno->apellido}}</td>
                      <td>{{$alumno_escuela->alumno->nombre}}</td>
                      <td>{{$alumno_escuela->escuela->nombre}}</td>
                      <td><a href="{{ route('alumnoEditar', ['id' => $alumno_escuela->alumno->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>  <a href="{{ route('alumnoVer', ['id' => $alumno_escuela->alumno->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a></td>
                    </tr>
                    @endforeach
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>



@endsection
