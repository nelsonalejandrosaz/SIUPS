@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ingresar Tutor')
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
                  <h3 class="box-title">Datos del Tutor</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('TutorNuevoPost') }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
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
                          <label for="inputEmail3" class="col-sm-4 control-label">DUI</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="09915467-6" name="dui">
                          </div>
                        </div>
                          <div class="form-group">
                          <label for="inputEmail4" class="col-sm-4 control-label">Carnet</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="MW21054" name="carnet">
                          </div>
                        </div>
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer col-md-12">
                    <a href="{{ route('tutoresLista') }}" class="btn btn-lg btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
                  </div><!-- /.box-footer -->
                    

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection