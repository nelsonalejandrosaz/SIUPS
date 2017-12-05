<style>
 
 .col-md-12 {
    width: 100%;
} 

body {
  font-family: ‘Arial Black’, Gadget, sans-serif;
  margin: 10mm 10mm 10mm 10mm;

}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}



.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
 border-collapse: collapse;


}



 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td .prueba {
    
  border-bottom: 1px solid #08088A;
}


.badge {
    display: inline-block;
    min-width: 20px;
  
    font-size: 13px;
    font-weight: 700;
    line-height: 2;
    color: #000000;
  
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 9px;
}

.bg-red {
    background-color: transparent ;
}




</style>
<body>
<div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                <h2> Reporte de Alumnos </h2>
                <h4>Alumnos que finalizaron su Servicio Social en el año: <u> {{$r}} </u></h4> 
                 
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table  class="table-1 table table-bordered ">
            <thead>
              <tr >
              <th style="text-align: left;">No.</th>
                <th  style="text-align: left;">Carnet</th>
                <th style="text-align: left;">Nombre</th>
                <th style="text-align: left;">Apellido</th>
                <th style="text-align: left;">Fecha Cierre</th>
                 <th style="text-align: left;">Escuela</th>
                
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


