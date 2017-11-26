
<a href="{{ route('certificado_alumno_descargar', ['carnet' => $alumno_escuelas->carnet]) }}">Download PDF</a>

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div style="text-align:center">
          <h2 class="">UNIVERSIDAD DE EL SALVADOR</h2> 

          <h2 class="">FACULTAD DE INGENIERIA Y ARQUITECTURA</h2>
          <h2 class="">UNIDAD DE PROYECCCION SOCIAL</h2>
          </div>
          <h2>El lnfrascrito/a Jefe/a de Unidad de Proyección Social de la Facultad de Ingeniería y Arquitectura de la Universidad de El Salvador.</h2>
   <div style="text-align:center"> <h3> CERTIFICA: </h3> </div>

<p style="font-size: 22px">Que el (la) Bachiller: <b> {{ $alumno_escuelas->alumno->nombre }}, {{ $alumno_escuelas->alumno->apellido }} </b>, con carné No. <b> {{ $alumno_escuelas->carnet }} </b> Estudiante de la Carrera de <b> {{ $alumno_escuelas->escuela->nombre }} </b>, de la Facultad de Ingeniería y Arquitectura, ha cumplido satisfactoriamente su Servicio Social, según los requerimientos que establece el Reglamento General de Proyección Social de la Universidad de El Salvador y el Manual de Procedimientos para el Servicio Social de la Facultad de Ingeniería y Arquitectura, conforme a la descripción detallada en el siguiente cuadro:</p>

       
        <br>
        
     
        <table border="1">
          <tr >
            <th style="width: 20%" rowspan="2">Modalidad de Servicio Social</th>
            <th style="width: 10%" colspan="2">Periodo</th>
            
            <th style="width: 5%" rowspan="2">Numero Horas</th>
            
          </tr>
          <tr>
            <th >Fecha Inicio</th>
            <th >Fecha Finalizacion</th>
            
          </tr>

           <tbody>
              @foreach($alumno_escuelas->expediente->serviciossociales as $alumno_escuelas)
                
    <tr class="alternar">
         
            <td >
            <!-- nombre de los servicio sociales hehcos por el elumno -->
      {{$alumno_escuelas->ssexp->nombre}} 
        
            </td>
           
           
            <td >
            {{$alumno_escuelas->ssexp->fecha_ingreso}} 
             <!--  fecha finalizacion del ss -->
               
            </td>

            <td >
            {{$alumno_escuelas->ssexp->fecha_fin}} 
             <!--  fecha finalizacion del ss -->
               
            </td>
           <td >
            {{$alumno_escuelas->ssexp->horas_totales}} 
             <!--  fecha finalizacion del ss -->
               
            </td>
           
          
         
   </tr>
            @endforeach
            </tbody>
            </table>

<p style="font-size: 22px"> Y para los siguientes tramites de graduación, se extiende la presente, en la Ciudad Universitaria, a los {{$dia}} de {{$mes}} de {{$anio}} </p>


</div></div></div></div></body></html>