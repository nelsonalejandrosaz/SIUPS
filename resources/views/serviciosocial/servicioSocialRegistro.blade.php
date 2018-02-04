@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
Nuevo Servicio Social
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Select2 -->
{{-- Sirve para se pueda buscar en los select --}}
<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
Nuevo Servicio Social
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')

@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')

<!--comienza la vista del formulario de registro Servicio Social-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos del Servicio Social</h3>
        <a href="{{ route('beneficiarioNuevo') }}" class="btn btn-md btn-primary pull-right"><span class="fa fa-university"></span> Beneficiario Nuevo</a>
        <a style="margin-right: 5px" href="{{ route('tutorNuevo') }}" class="btn btn-md btn-primary pull-right"><span class="fa fa-male"></span> Tutor Nuevo</a>
      </div><!-- /.box-header -->
      <form class="form-horizontal" action="{{ route('servicioSocialNuevoPost') }}" method="post">
        {{ csrf_field() }}

        <!-- inicio box-body -->
        <div class="box-body">
          <div class="col-sm-6">
            <h4 class="box-title">Servicio Social</h4>

            {{-- Estado SS --}}
            <input type="hidden" class="form-control" value="1" name="estado_id">
            
            {{-- Nombre SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label"><b>Nombre:*</b></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="nombre" value="{{old('nombre')}}">
              </div>
            </div>

            {{-- Descripcion SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label"><b>Descripcion:*</b></label>
              <div class="col-sm-9">
                <textarea class="form-control" placeholder="Descripcion del Proyecto" name="descripcion">{{old('descripcion')}}</textarea>
              </div>
            </div>

            {{-- Modalidad SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label">Modalidad:*</label>
              <div class="col-sm-9">
                <select class="form-control select2" style="width: 100%;" name="modalidad_id">
                
                  <option selected value="" disabled>Seleccione la modalidad </option>
                   @foreach($modalidades as $modalidad)
                   <option value="{{ $modalidad->id }}"@if(old('modalidad_id')==$modalidad->id){{'selected'}} @endif>{{ $modalidad->nombre }}</option>
                 @endforeach

                  
               </select>
             </div>
           </div>

           {{-- Fecha ingreso --}}
           <div class="form-group">
            <label class="col-sm-3 control-label"><b>Inicio del Servicio social:*</b></label>
            <div class="col-sm-9">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" id="datepicker" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}">
              </div>
            </div>
          </div>

          {{-- Fecha fin SS --}}
          <div class="form-group">
            <label class="col-sm-3 control-label">Fin del Servicio social:</label>
            <div class="col-sm-9">
             <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" class="form-control pull-right" id="datepicker" name="fecha_fin" value="{{ old('fecha_fin') }}">
            </div>
          </div>
        </div>

        {{-- Horas totales SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Horas totales del servicio social:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="2000" name="horas_totales" value="{{old('horas_totales')}}" min="0">
          </div>
        </div>

        {{-- Numero de alumnos --}}
        <div class="form-group">
          <label class="col-sm-3 control-label"><b>Numero de alumnos:*</b></label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="5" name="numero_estudiantes" value="{{old('numero_estudiantes')}}" min="1">
          </div>
        </div>

      </div>

      <div class="col-sm-6">
        <h4 class="box-title">Datos de solicitante del Servicio Social</h4>
        {{-- Solicitante SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label"><b>Entidad beneficiaria:*</b></label>
          <div class="col-sm-9">
            <select class="form-control select2" style="width: 100%;" name="beneficiario_id">
             <option selected value="" disabled>Seleccione el Beneficiario </option>
             @foreach($Beneficiarios as $Beneficiario)
             <option value="{{ $Beneficiario->id }}" @if(old('beneficiario_id')==$Beneficiario->id) {{'selected'}}@endif>{{ $Beneficiario->nombre }} {{$Beneficiario->apellido}} | {{ $Beneficiario->organizacion }}</option>
             @endforeach
           </select>
         </div>
       </div>

       {{-- Tutor SS --}}
       <div class="form-group">
        <label class="col-sm-3 control-label">Nombre del Tutor:</label>
        <div class="col-sm-9">
          <select class="form-control select2" style="width: 100%;" name="tutor_id">
           <option selected value="" disabled>Seleccione el Tutor</option>
           @foreach($Tutors as $Tutor)
           <option value="{{ $Tutor->id }}" @if(old('tutor_id')==$Tutor->id){{'selected'}}@endif>{{ $Tutor->nombre }} {{$Tutor->apellido}}</option>
           @endforeach
         </select>
       </div>
     </div>

     {{-- Departamento SS --}}
     <div class="form-group">
      <label class="col-sm-3 control-label"><b>Departamento:*</b></label>
      <div class="col-sm-9">
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
    <label class="col-sm-3 control-label"><b>Municipio:*</b></label>
    <div class="col-sm-9">
      <select class="form-control select2" id="select2Mup" style="width: 100%;" name="municipio_id">
       <option selected value="" disabled>Seleccione el municipio </option>
     </select>
   </div>
 </div>

        {{-- Beneficiarios directos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios directos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="15" name="beneficiarios_directos" value="{{old('beneficiarios_directos')}}" min="0">
          </div>
        </div>

        {{-- Beneficiarios indirectos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios indirectos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="100" name="beneficiarios_indirectos" value="{{old('beneficiarios_indirectos')}}" min="0">
          </div>
        </div>

        {{-- Monto SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Monto:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="2000" name="monto" value="{{old('monto')}}"  min="0">
          </div>
        </div>

</div>

</div><!-- /.box-body -->
<div class="box-footer">
  <a href="{{ route('servicioSocialLista') }}" class="btn btn-lg btn-default">Cancelar</a>
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

