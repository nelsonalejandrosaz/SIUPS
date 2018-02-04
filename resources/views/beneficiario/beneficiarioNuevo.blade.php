@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
	Nuevo beneficiario
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Select2 -->
{{-- Sirve para se pueda buscar en los select --}}
<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
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
              <div class="col-xs-5">
                <h4 class="box-title">Datos del contacto</h4>
                {{-- nombre --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombres:*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Juan" name="nombre" value="{{old('nombre')}}">
                  </div>
                </div>
                {{-- apellidos --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Apellidos:*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Pérez" name="apellido" value="{{ old('apellido') }}">
                  </div>
                </div>
                {{-- DUI --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">DUI:*</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="04058030-9" name="dui" value="{{ old('dui') }}" pattern="[0-9]{8}?[-]{1}?[0-9]{1}">
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
                  <input type="text" class="form-control" placeholder="2222-2222" name="telefono" value="{{ old('telefono') }}" minlength="8" maxlength="11">
                  </div>
                </div>
              </div>
            <div class="col-xs-7">
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
                  <input type="text" class="form-control" placeholder="2222-2222" name="telefono_organizacion" value="{{ old('telefono_organizacion') }}" minlength="8" maxlength="11">
                </div>
              </div>

              {{-- Tipo beneficiario --}}
               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo:</label>
                <div class="col-sm-10">
                  <select class="form-control select2" id="select2tipo" style="width: 100%;" name="tipo_id">
                    <option selected value="" disabled>Seleccione el tipo </option>
                   @foreach($tipos as $tipo)
                   <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                   @endforeach
                 </select>
               </div>
             </div>

              {{-- correo --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Correo:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="ejemplo@algo.com" name="correo_organizacion" value="{{ old('correo_organizacion') }}">
                </div>
              </div>

              {{-- Departamento SS --}}
               <div class="form-group">
                <label class="col-sm-2 control-label">Departamento:</label>
                <div class="col-sm-10">
                  <select class="form-control select2" id="select2Dep" style="width: 100%;" name="departamento_id">
                    <option selected value="" disabled>Seleccione el departamento </option>
                   @foreach($departamentos as $departamento)
                   <option value="{{ $departamento->id }}" @if(old('departamento_id')==$departamento->id){{'selected'}}@endif>{{ $departamento->nombre }}</option>
                   @endforeach
                 </select>
               </div>
             </div>

             {{-- Municipio SS --}}
             <div class="form-group">
              <label class="col-sm-2 control-label">Municipio:</label>
              <div class="col-sm-10">
                <select class="form-control select2" id="select2Mup" style="width: 100%;" name="municipio_id">
                    <option selected value="" disabled>Seleccione el municipio </option>
                  </select>
                </div>
              </div>

              {{-- direccion organizacion --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Direccion:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Direccion de la institucion" name="direccion_organizacion" value="{{ old('direccion_organizacion') }}">
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
<!-- Select2 -->
<script src="{{asset('/plugins/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    $select2Dep = $('#select2Dep');
    $select2Mup = $('#select2Mup');
    // $select2Dep.select2();
    // $select2Mup.select2();

    $select2Dep.change(function(event){
      $.get("/municipios/"+$select2Dep.val(),function(response,state){
        $select2Mup.select2('destroy');
        $select2Mup.empty();
        for (var i = 0; i < response.length; i++) {
          $('#select2Mup').append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
        }
        $select2Mup.select2();
      })
    })

  });
</script>
@endsection
