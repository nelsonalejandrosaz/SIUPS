@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
  Modificar tutor
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Modificar tutor
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')
 
@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')


<!--comienza la vista del formulario de editar tutores-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Tutor</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="{{ route('TutorEditarPost', ['id'=> $tutor->id]) }}" method="post">
                {{ csrf_field() }}

                  <!-- inicio box-body -->
                    <div class="box-body">
                      <div class="col-xs-6">
                        <h4 class="box-title">Datos personales</h4>
                        
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Nombre:*</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->nombre }}" name="nombre">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Apellido:*</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->apellido }}" name="apellido">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Correo:*</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{ $tutor->correo }}" name="correo">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">DUI:*</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->dui }}" name="dui" pattern="[0-9]{8}?[-]{1}?[0-9]{1}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Carnet:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $tutor->carnet }}" name="carnet">
                          </div>
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                    <a href="{{ route('tutoresLista') }}" class="btn btn-lg btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-lg btn-success pull-right">Guardar cambios</button>
                  </div><!-- /.box-footer -->

                </form>
              </div><!-- /.box -->
  </div>
</div>

@endsection
