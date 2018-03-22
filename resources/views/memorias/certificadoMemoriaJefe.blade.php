<style type="text/css">
table {border-collapse:collapse;}
td, th {border:1px solid black}
</style>
<body> 
<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <div style="text-align:left;">

UNIVERSIDAD DE EL SALVADOR <br>
FACULTAD DE INGENIERIA Y ARQUITECTURA <br>

</div>
<div style="text-align:center;">
<h2>Certificados Emitidos Año: <u> {{$r}} </u> </h2>
</div>
            
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table width="98%" align="center">
            <thead>
              <tr >
              <th style="text-align: center;width: 6%">No.</th>
                <th  style="text-align: center; width: 14%">Carnet</th>
                <th style="text-align: center;">Nombres</th>
                <th style="text-align: center;">Apellidos</th>
                <th style="text-align: center; width: 12%">Fecha</th>
                 <th style="text-align: center; width:21%">Escuela</th>
                
           </tr>
            </thead>

            <tbody>
             @foreach($reportAnioEscu as $anio)
              <tr >
              <td>{{$contador}}</td>
              <td>{{$anio->carnet}}</td>
              <td>{{$anio->nombre}}</td>
              <td>{{$anio->apellido}}</td>
              <td>{{$anio->fecha_cierre}}</td>
             <td>{{$anio->esnom}}</td>
             

            </tr>
           <td style="display: none"> {{$contador=$contador+1}}</td>
            @endforeach

</tbody> 
            <tfoot>
            </tfoot>
         </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                </div>
              </div><!-- /.box -->

              
            </div>
     

  
</body>
</html>