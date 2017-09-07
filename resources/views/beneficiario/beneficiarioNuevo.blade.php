@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
	Nuevo beneficiario
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Nuevo beneficiario
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')
 
@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos de la ficha de beneficiario</h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal" action="{{ route('beneficiarioNuevoPost') }}" method="post">
        {{ csrf_field() }}
          <!-- inicio box-body -->
          <div class="box-body">
              <div class="col-xs-6">
                <h4 class="box-title">Datos del contacto</h4>
                {{-- nombre --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombres:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Juan" name="nombre" value="{{old('nombre')}}">
                  </div>
                </div>
                {{-- apellidos --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Apellidos:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Pérez" name="apellido" value="{{ old('apellido') }}">
                  </div>
                </div>
                {{-- DUI --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">DUI:</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="04058030-9" name="dui" value="{{ old('dui') }}">
                  </div>
                </div>
                {{-- correo --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo:</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control" placeholder="ejemplo@algo.com" name="correo" value="{{ old('correo') }}">
                  </div>
                </div>
                {{-- telefono --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="2222-2222" name="telefono" value="{{ old('telefono') }}">
                  </div>
                </div>
              </div>
            <div class="col-xs-6">
              <h4 class="box-title">Datos de organizacion</h4>
              {{-- nombre organizacion --}}
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nombre de la Institucion" name="organizacion" value="{{ old('organizacion') }}">
                </div>
              </div>
              {{-- telefono organizacion  --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Telefono:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="2222-2222" name="telefonoOrganizacion" value="{{ old('telefonoOrganizacion') }}">
                </div>
              </div>
              {{-- correo --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Correo:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="ejemplo@algo.com" name="correoOrganizacion" value="{{ old('correoOrganizacion') }}">
                </div>
              </div>
              {{-- direccion organizacion --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Direccion:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Direccion de la institucion" name="direccionOrganizacion" value="{{ old('direccionOrganizacion') }}">
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
        <div class="box-footer">
        <a href="{{ route('beneficiarioLista') }}" class="btn btn-lg btn-default">Cancelar</a>
        <button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
        </div><!-- /.box-footer -->
      </form>
    </div><!-- /.box -->
  </div>
</div>

@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')

@endsection
