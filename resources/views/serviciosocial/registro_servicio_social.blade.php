@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ingreso de alumno')
@section('contentheader_description', '')


@section('main-content')

<!--Mensaje de error Servicio Social-->
@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      @foreach($errors->all() as $error)
      <li>{{$error}}
      </li> @endforeach
    </div>
  @endif
<!--Mensaje de Advertencia Servicio Social-->
@if(session()->has('advertencia'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      {{ session()->get('advertencia') }}
    </div>
@endif

<!--comienza la vista del formulario de registro Servicio Social-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Servicio Social</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('alumnoNuevoPost') }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-12">
                        <h4 class="box-title">Servicio Social</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Nombre:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="nombreSS">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Inicio del Servicio social:</label>
                          <div class="col-sm-10">
                            <input type="date"  class="form-control" name="inicioSS">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Fin del Servicio social:</label>
                          <div class="col-sm-10">
                            <input type="date"  class="form-control" name="finSS">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Horas totales del servicio social:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="horastSS">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Horas por alumno:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="horasaSS">
                          </div>
                        </div>

                      </div>
                      <div class="col-xs-12">
                        <h4 class="box-title">Datos de solicitante del Servicio Social</h4>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Entidad beneficiaria:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nombre de la entidad solicitante" name="entidaddSS">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Entidad beneficiaria:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nombre de la entidad solicitante" name="entidadiSS">
                          </div>
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                    <a href="{{ route('alumnoLista') }}" class="btn btn-lg btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
                  </div><!-- /.box-footer -->

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection
