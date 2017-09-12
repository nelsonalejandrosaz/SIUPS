@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ver Tutor')
@section('contentheader_description', '')


@section('main-content')


<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Tutor</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('TutorEditarPost' , ['id' => $tutor->id]) }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
                       
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Nombre:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->nombre }}" name="nombre" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Apellido:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->apellido }}" name="apellido" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Correo:</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{ $tutor->correo }}" name="correo" disabled="">
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos de trabajo</h4>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Dui</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->dui}}" name="dui" disabled="">
                          </div>
                        </div>
                         
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                    <a href=" {{ route('tutoresLista') }} " class="btn btn-lg btn-default">Ver Lista</a>
                    <a href="{{ route('TutorEditar',['id'=>$tutor->id]) }}" class="btn btn-lg btn-warning pull-right">Editar</a>
                    <!-- <button type="submit" class="btn btn-lg btn-success pull-right">Guardar cambios</button> -->
                  </div><!-- /.box-footer -->

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection
