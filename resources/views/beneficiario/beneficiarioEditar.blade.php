@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
  Modificar beneficiario
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Select2 -->
{{-- Sirve para se pueda buscar en los select --}}
<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Modificar beneficiario
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
                  <label class="col-sm-2 control-label">Nombres:*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $beneficiario->nombre }}" name="nombre">
                  </div>
                </div>
                {{-- apellidos --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Apellidos:*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $beneficiario->apellido }}" name="apellido">
                  </div>
                </div>
                {{-- DUI --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">DUI:*</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->dui}}" name="dui" pattern="[0-9]{8}?[-]{1}?[0-9]{1}">
                  </div>
                </div>
                {{-- correo --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo:</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{ $beneficiario->correo }}" name="correo">
                  </div>
                </div>
                {{-- telefono --}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono:</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->telefono }}" name="telefono" minlength="8" maxlength="11">
                  </div>
                </div>
              </div>
            <div class="col-xs-6">
              <h4 class="box-title">Datos de organizacion</h4>
              {{-- nombre organizacion --}}
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->organizacion }}" name="organizacion">
                </div>
              </div>
              {{-- telefono organizacion  --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Telefono :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->telefono_organizacion }}" name="telefono_organizacion" minlength="8" maxlength="11">
                </div>
              </div>

              {{-- Tipo beneficiario --}}
               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo:</label>
                <div class="col-sm-10">
                  <select class="form-control select2" id="select2tipo" style="width: 100%;" name="tipo_id">
                    @foreach($tipos as $tipo)
                      @if($tipo->id == $beneficiario->tipo->id)
                     <option selected value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                     @else
                     <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                     @endif
                     @endforeach
                 </select>
               </div>
             </div>

              {{-- correo --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Correo :</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ $beneficiario->correo_organizacion }}" name="correo_organizacion">
                </div>
              </div>

              {{-- Departamento SS --}}
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Departamento:</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="departamento_id" >
                     @foreach($departamentos as $departamento)
                      @if($departamento->id == $beneficiario->municipio->departamento_id)
                     <option selected value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                     @else
                     <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                     @endif
                     @endforeach
                   </select>
                 </div>
               </div>

               {{-- Municipio SS --}}
               <div class="form-group">
                <label class="col-sm-2 control-label">Municipio:</label>
                <div class="col-sm-10">
                  <select class="form-control select2" style="width: 100%;" name="municipio_id" >
                   @foreach($municipios as $municipio)
                    @if($municipio->id == $beneficiario->municipio_id)
                   <option selected value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                   @else
                   <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                   @endif
                   @endforeach
                 </select>
               </div>
             </div>

              {{-- direccion organizacion --}}
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Direccion :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $beneficiario->direccion_organizacion }}" name="direccion_organizacion">
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
