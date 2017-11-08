@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
Ver Servicio Social
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Select2 -->
{{-- Sirve para se pueda buscar en los select --}}
<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
Ver Servicio Social
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')

@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')
@include('partials.mensajes')

<!--comienza la vista del formulario de registro Servicio Social-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos del Servicio Social</h3>
      </div><!-- /.box-header -->
      <form class="form-horizontal" action="{{ route('servicioSocialEditarPost' , ['id' => $servicioSocial->id]) }}" method="post">
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
                <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="nombre" value="{{$servicioSocial->nombre}}" disabled="true">
              </div>
            </div>

            {{-- Descripcion SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label"><b>Descripcion:*</b></label>
              <div class="col-sm-9">
                <textarea disabled class="form-control" placeholder="Descripcion del Proyecto" name="descripcion">{{$servicioSocial->descripcion}}</textarea>
              </div>
            </div>

            {{-- Modalidad SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label">Modalidad:</label>
              <div class="col-sm-9">
                <select class="form-control select2" style="width: 100%;" name="modalidad_id" disabled="true">
                 @foreach($modalidades as $modalidad)
                 @if($modalidad->id==$servicioSocial->modalidad_id)
                 <option selected value="{{ $modalidad->id }}" >{{ $modalidad->nombre }}</option>
                 @else
                  <option value="{{ $modalidad->id }}" >{{ $modalidad->nombre }}</option>
                @endif

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
                <input type="date" class="form-control pull-right" id="datepicker" name="fecha_ingreso" value="{{$servicioSocial->fecha_ingreso}}" disabled="true">
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
              <input type="date" class="form-control pull-right" id="datepicker" name="fecha_fin" value="{{$servicioSocial->fecha_fin}}" disabled="true">
            </div>
          </div>
        </div>

        {{-- Horas totales SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Horas totales del servicio social:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="horas_totales" value="{{$servicioSocial->horas_totales}}" disabled="true">
          </div>
        </div>

        {{-- Numero de alumnos --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Numero de alumnos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="numero_estudiantes" value="{{$servicioSocial->numero_estudiantes}}" disabled="true">
          </div>
        </div>

       {{-- Estado SS --}}
            <div class="form-group">
              <label class="col-sm-3 control-label">Estado:</label>
              <div class="col-sm-9">
                <select class="form-control select2" style="width: 100%;" name="estado_id" disabled="true">
                 @foreach($estados as $estado)
                 @if($estado->id==$servicioSocial->estado_id)
                 <option selected value="{{ $estado->id }}" >{{ $estado->nombre }}</option>
                 @else
                  <option value="{{ $estado->id }}" >{{ $estado->nombre }}</option>
                @endif

                 @endforeach
               </select>
             </div>
           </div> 

    </div>

     

      <div class="col-sm-6">
        <h4 class="box-title">Datos de solicitante del Servicio Social</h4>
        {{-- Solicitante SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Entidad beneficiaria:</label>
          <div class="col-sm-9">
            <select class="form-control select2" style="width: 100%;" name="beneficiario_id" disabled="true">
             @foreach($Beneficiarios as $Beneficiario)
              @if($Beneficiario->id == $servicioSocial->beneficiario_id)
             <option selected value="{{ $Beneficiario->id }}"> {{ $Beneficiario->nombre }} {{$Beneficiario->apellido}} | {{ $Beneficiario->organizacion}}</option>
              @else
              <option value="{{ $Beneficiario->id }}">{{ $Beneficiario->nombre }} {{$Beneficiario->apellido}} | {{ $Beneficiario->organizacion }}</option>
              @endif
              @endforeach
           </select>
         </div>
       </div>

       {{-- Tutor SS --}}
       <div class="form-group">
        <label class="col-sm-3 control-label">Nombre del Tutor:</label>
        <div class="col-sm-9">
         <select class="form-control select2" style="width: 100%;" name="tutor_id" disabled="true">
          <option selected value="" disabled>Seleccione el Tutor</option>
           @foreach($Tutors as $Tutor)
           @if($Tutor->id == $servicioSocial->tutor_id)

           <option selected value="{{ $Tutor->id }}">{{ $Tutor->nombre }} {{$Tutor->apellido}}</option>
           @else

           <option value="{{ $Tutor->id }}">{{ $Tutor->nombre }} {{$Tutor->apellido}}</option>
           @endif
           @endforeach
         </select>
       </div>
     </div>

     {{-- Departamento SS --}}
     <div class="form-group">
      <label class="col-sm-3 control-label">Departamento:</label>
      <div class="col-sm-9">
        <select class="form-control select2" style="width: 100%;" name="departamento_id" disabled="true">
         @foreach($departamentos as $departamento)
          @if($departamento->id == $servicioSocial->municipio->departamento_id)
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
    <label class="col-sm-3 control-label">Municipio:</label>
    <div class="col-sm-9">
      <select class="form-control select2" style="width: 100%;" name="municipio_id" disabled="true">
       @foreach($municipios as $municipio)
        @if($municipio->id == $servicioSocial->municipio_id)
       <option selected value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
       @else
       <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
       @endif
       @endforeach
     </select>
   </div>
 </div>

        {{-- Beneficiarios directos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios directos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control"  name="beneficiarios_directos" value="{{$servicioSocial->beneficiarios_directos}}" disabled="true">
          </div>
        </div>

        {{-- Beneficiarios indirectos SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Beneficiarios indirectos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="beneficiarios_indirectos" value="{{$servicioSocial->beneficiarios_indirectos}}" disabled="true">
          </div>
        </div>

        {{-- Monto SS --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Monto:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="monto" value="{{$servicioSocial->monto}}" disabled="true">
          </div>
        </div>

</div>

</div><!-- /.box-body -->
<div class="box-footer">
  <a href="{{ route('servicioSocialLista') }}" class="btn btn-lg btn-default">Ver Lista</a>
 @if( Auth::user()->rol[0]->nombre == "coordinador_Sups")
  <a href="{{ route('servicioSocialEditar',['id'=>$servicioSocial->id]) }}" class="btn btn-lg btn-warning pull-right">Editar</a>
  @endif
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

