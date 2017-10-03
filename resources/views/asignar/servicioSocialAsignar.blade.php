@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
Asignar alumnos a Servicio Social
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Select2 -->
{{-- Sirve para se pueda buscar en los select --}}
<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
Asignar alumnos a Servicio Social
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')

@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}
@include('partials.alertaerror')
@include('partials.alertamensajes')


<!-- Form de la asignacion de alumnos al servicio social -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Detalles del Servicio Social</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="" method="POST">
    {{ csrf_field() }}
    <div class="box-body">

      <div class="col-md-6">
        {{-- Nombre del SS --}}
        <div class="form-group">
          <label class="col-sm-4 control-label">Nombre:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="nombre" value="{{ $servicioSocial->nombre }}" disabled>
          </div>
        </div>

        {{-- Descripcion del SS --}}
        <div class="form-group">
          <label class="col-sm-4 control-label">Descripción:</label>
          <div class="col-sm-8">
            <textarea name="descripcion" class="form-control" disabled>{{ $servicioSocial->nombre }}</textarea>
          </div>
        </div>

        {{-- Tutor SS --}}
        <div class="form-group">
          <label class="col-sm-4 control-label">Nombre del Tutor:</label>
          <div class="col-sm-8">
            <select class="form-control select2" style="width: 100%;" name="tutor_id" disabled>
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

      </div>

      <div class="col-md-6">
        
        {{-- Numero de alumnos --}}
        <div class="form-group">
          <label class="col-sm-3 control-label">Numero de alumnos:</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="numero_estudiantes" value="{{$servicioSocial->numero_estudiantes}}" disabled="true" id="numeroEstudiante">
          </div>
        </div>

      </div>

            {{-- Fila --}}
      <div class="col-sm-12">
        {{-- Tabla de productos --}}
        <table class="table table-bordered" id="tblProductos">
          <tr>
            <th style="width: 5%">#</th>
            <th style="width: 45%">Alumno</th>
            <th style="width: 20%">Horas asignadas</th>
            <th style="width: 10%">
              <button class="btn btn-success" id="btnNuevoProducto" onclick="funcionNuevoProducto()" type="button">
                          <span class="fa fa-plus"></span>  Agregar
                      </button>
            </th>
          </tr>
          <tr>
            <td>
              1
            </td>
            <td>
              <select class="form-control select2" style="width: 100%;" name="tutor_id" id="selectProductos">
              <option selected value="" disabled>Seleccione el alumno</option>
              @foreach($alumnos_escuela as $alumno_escuela)
              {{-- @if($alumno->id == $servicioSocial->tutor_id) --}}
              {{-- <option selected value="{{ $Tutor->id }}">{{ $Tutor->nombre }} {{$Tutor->apellido}}</option> --}}
              {{-- @else --}}
              <option value="{{ $alumno_escuela->carnet }}">{{ $alumno_escuela->carnet }} | {{$alumno_escuela->alumno->apellido}} {{$alumno_escuela->alumno->nombre}}</option>
              {{-- @endif --}}
              @endforeach
            </select>
            </td>
            <td>
              <input type="number" class="form-control" value="0" name="horas[]" required>
            </td>
            <td align="center">

            </td>
          </tr>
        </table>
      </div>




    </div><!-- /.box-body -->

    <div class="box-footer">
      <a href="" class="btn btn-lg btn-default">Cancelar</a>
      <button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
    </div>
  </form>
</div><!-- /.box -->


@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')
<!-- Select2 -->
<script src="{{asset('/plugins/select2.full.min.js')}}"></script>

<script>
  $(document).on('ready', funcionPrincipal());

  function funcionPrincipal() {
    $("body").on( "click", ".btn-danger",funcionEliminarProducto);
  }
  var numero = 2;
  var numeroMax = $('#numeroEstudiante').val();
  var numeroEstudiante = 1;

  function funcionNuevoProducto() {
    if (numeroEstudiante < numeroMax) {

        copia = $('#selectProductos').clone(false);
      $('#tblProductos')
      .append
      (
        $('<tr>').attr('id','rowProducto'+numero)
        .append
        (
          $('<td>')
          .append
          (
            numero
          )
        )
        .append
        (
          $('<td>')
          .append
          (
            copia
          )
        )
        .append
        (
          $('<td>')
          .append
          (
            '<input type="number" class="form-control" placeholder="100" name="cantidades[]" required>'
          )
        )
        .append
        (
          $('<td>').attr('align','center')
          .append
          (
            '<button type="button" class="btn btn-danger" click="funcionEliminarProducto()" type="button"><span class="fa fa-remove"></span></button>'
          )
        )
      );
      //Initialize Select2 Elements
        $(".select2").select2();
        $(".select2").select2();
        numero++;
        numeroEstudiante++;

    }
    
  }

  function funcionEliminarProducto() {
    // $(this).remove().end();
    // $(this).closest('tr').remove();
    // console.log($(this).parent().parent());
    $(this).parent().parent().remove();
    numero--;
    numeroEstudiante--;
  }

</script>
{{-- Fin de funcion para cargar mas filas de productos --}}
@endsection
