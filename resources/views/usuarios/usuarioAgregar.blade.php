@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ingreso de usuario')
@section('contentheader_description', '')


@section('main-content')

@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      @foreach($errors->all() as $error)
      <li>{{$error}} 
      </li> @endforeach
    </div>
  @endif

@if(session()->has('advertencia'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      {{ session()->get('advertencia') }}
    </div>
@endif

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del usuario</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('usuarioNuevoPost') }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="AA17001" name="username">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Nombre:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                          </div>
                        </div>
                        <div class="form-group">

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Apellido:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Correo:</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="ejemplo@algo.com" name="correo">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos de puesto</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Rol</label>
                          <div class="col-sm-12">
                            <select class="form-control" name="rol">
                              @foreach($rols as $rol)
                                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                          <div class="form-group">
                          <label for="inputEmail4" class="col-sm-3 control-label">Escuela</label>
                          <div class="col-sm-12">
                            <select class="form-control" name="escuela">
                              @foreach($escuelas as $escuela)
                                <option value="{{$escuela->id}}">{{$escuela->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="inputPassword5" class="col-sm-4 control-label">Contraseña:</label>
                          <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                          </div>
                        </div>

                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer col-md-12">
                    <a href="{{ route('usuariosLista') }}" class="btn btn-lg btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
                  </div><!-- /.box-footer -->

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection