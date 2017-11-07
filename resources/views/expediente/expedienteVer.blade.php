@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
	Expediente de {{$alumno_escuela->alumno->nombre}} {{$alumno_escuela->alumno->apellido}}
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
  Expediente de {{$alumno_escuela->alumno->nombre}} {{$alumno_escuela->alumno->apellido}}
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
        <div style="text-align:center">
          <h2 class="">Hoja de Expediente</h2>
          <h4>Universidad de El Salvador</h4>
          <h4>Facultad de Ingenieria y Arquitectura</h4>
          <h4>Escuela de ingenieria de {{ $alumno_escuela->escuela->nombre }}</h4>
          <h4>Subunidad de proyeccion Social</h4>
          <br>
          <h4>Resumen Servicio Social Desarrollado</h4>
        <br>
        </div>
        <table class="table">
          <tr>
            <th>Datos de alumno</th>
            <th></th>
          </tr>
          <tr>
            <td>Nombre: {{ $alumno_escuela->alumno->apellido }}, {{ $alumno_escuela->alumno->nombre }}</td>
            <td>Carnet: {{ $alumno_escuela->carnet }}</td>
          </tr>
          <tr>
            <td>Direccion: {{ $alumno_escuela->alumno->direccion }}</td>
            <td>Telefono personal: {{ $alumno_escuela->alumno->telefono }}</td>
          </tr>
          <tr>
            <td>Correo electronico: {{ $alumno_escuela->alumno->correo }}</td>
            <td></td>
          </tr>
            <td>Lugar de trabajo: {{ $alumno_escuela->alumno->lugar_trabajo }}</td>
            <td>Telefono de trabajo: {{ $alumno_escuela->alumno->telefono_trabajo }}</td>
        </table>
        <br>
        <table border="3">
          <tr>
            <th style="width: 5%" rowspan="2">No</th>
            <th style="width: 20%" rowspan="2">Servicio Social</th>
            <th style="width: 15%" rowspan="2">Tutor</th>
            <th style="width: 20%" colspan="2">Fecha</th>
            <th style="width: 10%" rowspan="2">Horas asignadas</th>
            <th style="width: 10%" rowspan="2">Monto</th>
            <th style="width: 10%" colspan="2">Beneficiarios</th>
            <th style="width: 10%" rowspan="2">Estado</th>
          </tr>
          <tr>
            <th>Inicio</th>
            <th>Finalizacion</th>
            <th>Directos</th>
            <th>Indirectos</th>
          </tr>

           <tbody>
             @foreach($expe_ss as $fila)
                
    <tr class="alternar">
            <td> </td>
            <td style="border:1px solid;padding:3px 3px 3px;">
            <!-- nombre de los servicio sociales hehcos por el elumno -->

                {{$fila->ssexp->nombre}} 
        
            </td>
            <td >
            <!-- tutores -->
            @php($existe=isset($fila->ssexp->tutor))
             @if($existe)
             {{$fila->ssexp->tutor->nombre}} 
            @else
              Sin Tutor
            @endif

            </td>
            <td>

           
             <!--  fecha inicio del ss -->
           <!--     @foreach($expediente_servicios as $uu) 
                   @foreach($expediente as $exp)

                   @if($uu->expediente_alumno_id == $exp->id)
                    {{$uu->horas_ganadas}}
                   @endif

              @endforeach
              @endforeach -->
            </td>
            <td>
             <!--  fecha finalizacion del ss -->
               
            </td>
            <td >
             
           <!--   Horas ganadas/asignadas  saacads de la tabla expediente_serviciosocials -->

               {{$fila->horas_ganadas}} 
            </td>
            <td>
              <!-- Monto del SS -->
               {{$fila->ssexp->monto}} 
              

            </td>
            <td >
               <!-- Beneficiarios directos-->
                 {{$fila->ssexp->beneficiarios_directos}} 
            </td>
            <td>
 <!-- Beneficiarios indirectos-->
              {{$fila->ssexp->beneficiarios_indirectos}} 

            </td>
            <td>
<!-- estado de los servicios sociales del expediente del alumno -->
{{$fila->ssexp->estado->nombre}} 
              

            </td>
            <td>
          
            </td>
         
   </tr>
            @endforeach
        </table>
        <div>
          <br>
          <h4>Observaciones:</h4>
          <p>{{ $alumno_escuela->expediente->observaciones }}</p>
        </div>
      </div><!-- /.box-header -->
      
    </div><!-- /.box -->
  </div>
</div>

@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')

<style>
  td.rollover:hover{
   background-color:#CED8F6;

  }

   tr:hover td{background:#EFF2FB;}
</style>

@endsection
