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
              <label class="col-sm-3 control-label">Nombre:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="nombre" value="{{old('nombre')}}">
              </div>
            </div>

            {{-- Modalidad SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label">Modalidad:</label>
              <div class="col-sm-9">
                <select class="form-control select2" style="width: 100%;" name="modalidad_id">
                 @foreach($modalidades as $modalidad)
                 <option value="{{ $modalidad->id }}" @if(old('modalidad_id')==$modalidad->id){{'selected'}} @endif>{{ $modalidad->nombre }}</option>
                 @endforeach
               </select>
             </div>
           </div>

           {{-- Fecha ingreso --}}
           <div class="form-group">
            <label class="col-sm-3 control-label">Inicio del Servicio social:</label>
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
            <input type="number" class="form-control" placeholder="2000" name="horas_totales" value="{{old('horas_totales')}}">
          </div>
        </div>

        {{-- Numero de alumnos --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Numero de alumnos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="5" name="numero_estudiantes" value="{{old('numero_estudiantes')}}">
          </div>
        </div>

      </div>

      <div class="col-sm-6">
        <h4 class="box-title">Datos de solicitante del Servicio Social</h4>
        {{-- Solicitante SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Entidad beneficiaria:</label>
          <div class="col-sm-9">
            <select class="form-control select2" style="width: 100%;" name="beneficiario_id">
             <option selected value="" disabled>Seleccione el Beneficiario</option>
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
      <label class="col-sm-3 control-label">Departamento:</label>
      <div class="col-sm-9">
        <select class="form-control select2" style="width: 100%;" name="departamento_id">
         @foreach($departamentos as $departamento)
         <option value="{{ $departamento->id }}" @if(old('departamento_id')==$departamento->id){{'selected'}}@endif>{{ $departamento->nombre }}</option>
         @endforeach
       </select>
     </div>
   </div>

   {{-- Municipio SS --}}
   <div class="form-group">
    <label class="col-sm-3 control-label">Municipio:</label>
    <div class="col-sm-9">
      <select class="form-control select2" style="width: 100%;" name="municipio_id">
       @foreach($municipios as $municipio)
       <option value="{{ $municipio->id }}" @if(old('municipio_id')==$municipio->id){{'selected'}}@endif>{{ $municipio->nombre }}</option>
       @endforeach
     </select>
   </div>
 </div>

        {{-- Beneficiarios directos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios directos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="15" name="beneficiarios_directos" value="{{old('beneficiarios_directos')}}">
          </div>
        </div>

        {{-- Beneficiarios indirectos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios indirectos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="100" name="beneficiarios_indirectos" value="{{old('beneficiarios_indirectos')}}">
          </div>
        </div>

        {{-- Monto SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Monto:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="2000" name="monto" value="{{old('monto')}}">
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

  });
</script>
@endsection

