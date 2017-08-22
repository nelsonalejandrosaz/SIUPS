@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ver usuario')
@section('contentheader_description', '')


@section('main-content')


<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Usuario</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Username:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $usuario->username }}" name="username" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Nombre:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $usuario->name }}" name="nombre" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Apellido:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $usuario->apellido }}" name="apellido" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Correo:</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{ $usuario->email }}" name="correo" disabled="">
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos de trabajo</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Rol</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $usuario->rol[0]->nombre}}" name="Rol" disabled="">
                          </div>
                        </div>
                         @if($usuario->rol[0]->nombre =='coordinador_Sups') 
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Escuela</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $usuario->escuela->nombre }}" name="escuela" disabled="">
                          </div>
                        </div>
                        @endif
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                    <a href=" {{ route('alumnoLista') }} " class="btn btn-lg btn-default">Regresar</a>
                    <!-- <button type="submit" class="btn btn-lg btn-success pull-right">Guardar cambios</button> -->
                  </div><!-- /.box-footer -->

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection
