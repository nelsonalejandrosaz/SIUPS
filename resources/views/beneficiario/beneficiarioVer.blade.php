@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
  Nuevo tutor
@endsection

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
        <h3 class="box-title">Datos de la organización</h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal" action="{{ route('beneficiarioEditarPost', ['id' => $beneficiario->id]) }}" method="post">
        {{ csrf_field() }}
          <!-- inicio box-body -->
          <div class="box-body">
              <div class="col-xs-6">
                <h4 class="box-title">Datos del contacto</h4>
                {{-- nombre --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombres:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $beneficiario->nombre }}" name="nombre" disabled="true">
                  </div>
                </div>
                {{-- apellidos --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Apellidos:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $beneficiario->apellido }}" name="apellido" disabled="true">
                  </div>
                </div>
                {{-- DUI --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">DUI:</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->dui}}" name="dui" disabled="true">
                  </div>
                </div>
                {{-- correo --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo:</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{ $beneficiario->correo }}" name="correo" disabled="true">
                  </div>
                </div>
                {{-- telefono --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->telefono }}" name="telefono" disabled="true">
                  </div>
                </div>
              </div>
            <div class="col-xs-6">
              <h4 class="box-title">Datos de organizacion</h4>
              {{-- nombre organizacion --}}
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->organizacion }}" name="organizacion" disabled="true">
                </div>
              </div>
              {{-- telefono organizacion  --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Telefono :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->telefonoOrganizacion }}" name="telefonoOrganizacion" disabled="true">
                </div>
              </div>
              {{-- correo --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Correo :</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ $beneficiario->correoOrganizacion }}" name="correoOrganizacion" disabled="true">
                </div>
              </div>
              {{-- direccion organizacion --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Direccion :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->direccionOrganizacion }}" name="direccionOrganizacion" disabled="true">
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
        <div class="box-footer">
        <a href="{{ route('beneficiarioLista') }}" class="btn btn-lg btn-default">Regresar</a>
        
        </div><!-- /.box-footer -->
      </form>
    </div><!-- /.box -->
  </div>
</div>

@endsection
