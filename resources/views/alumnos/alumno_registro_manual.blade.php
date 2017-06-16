@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ingreso de alumno')
@section('contentheader_description', '')


@section('main-content')


<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Alumno</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('alumnoNuevoPost') }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Carnet:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="AA17001" name="carnet">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Nombre:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Apellido:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Correo:</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="ejemplo@algo.com" name="correo">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Telefono:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="2222-2222" name="telefono">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Direccion:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos de trabajo</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Lugar de trabajo</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Lugar de trabajo" name="lugar_trabajo">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Telefono de trabajo</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="2222-2222" name="telefono_trabajo">
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
