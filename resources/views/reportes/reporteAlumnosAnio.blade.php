<div class="row">
Alumnos que finalizaron su servicio social en el anio:  {{$anio}}


 <table >
            <thead>
              <tr>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Cierre</th>
                <th>Escuela</th>
              
               
                  
              </tr>
            </thead>
            <tbody>
             @foreach($anio as $anio)
              <tr>
              <td>{{$anio->alumno_escuela->carnet}}</td>
              <td>{{$anio->alumno_escuela->alumno->nombre}}</td>
              <td>{{$anio->alumno_escuela->alumno->apellido}}</td>
              <td>{{$anio->alumno_escuela->expediente->fecha_cierre}}</td>
              <td>{{$anio->alumno_escuela->escuela->nombre}}</td>    
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>



</div>

