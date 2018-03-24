

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div style="text-align:left">
          <p class="">UNIVERSIDAD DE EL SALVADOR <br> FACULTAD DE INGENIERIA Y ARQUITECTURA <br>
            @if($user == 2)
            UNIDAD DE PROYECCION SOCIAL
            @endif
            @if($user == 3)
            ESCUELA DE INGENIERIA DE SISTEMAS INFORMATICOS</p>
            @endif
            @if($user == 4)
            ESCUELA DE INGENIERIA ELECTRICA</p>
            @endif
            @if($user == 5)
            ESCUELA DE INGENIERIA INDUSTRIAL</p>
            @endif
            @if($user == 6)
            ESCUELA DE INGENIERIA DE MECANICA</p>
            @endif
            @if($user == 7)
            ESCUELA DE INGENIERIA DE CIVIL</p>
            @endif
            @if($user == 8)
            ESCUELA DE INGENIERIA QUIMICA Y ALIMENTOS</p>
            @endif
            @if($user == 9)
            ESCUELA DE ARQUITECTURA</p>
            @endif
          </div>
          <br></br> 
          <p style="text-align: center;"> <b><i>MEMORIA DE LABORES PERIODO DE _ A _ DEL AÑO {{$anio}}</i><BR></BR>Cuadro resumen proyectos EN EJECUCION</b></P>

        <br></br>
        <br></br>     
       <table style="border: 1px solid; border-collapse: collapse; margin: 15px;
  padding: 15px;"  >
                    <thead >
                      <tr >
                        <th style="text-align: center;">Nombre del proyecto</th>
                        <th  style="text-align: center;">Lugar de ejecucion</th>
                        <th style="text-align: center;">Beneficiarios Directos</th>
                        <th style="text-align: center;">Fecha inicial</th>
                        <th style="text-align: center;">Estudiantes</th>
                        
                      </tr>
                    </thead>

                    <tbody ">
                     @foreach(  $servicios_sociales as $ss)
                      <tr >
                        <td>{{$ss->ss_nombre}}</td>
                        <td>{{$ss->mun_nombre}} / {{$ss->dep_nombre}}</td>
                        <td>{{$ss->beneficiarios_directos}}</td>
                        <td>{{$ss->fecha_ingreso}}</td>
                        <td>{{$ss->alu_nombre}}, {{$ss->alu_apellido}}</td>
                        
                      </tr>
                   
                    @endforeach

                   
            </tbody>
            <tfoot>
            </tfoot>
         </table>


</div></div></div></div></body></html>
                  
               