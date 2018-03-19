@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
Lista de certificados
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
Lista de certificados
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')

@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

{{-- Include de los mensajes de errror --}}

@include('partials.alertaerror')
@include('partials.mensajes')
@include('partials.modal')

<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Alumnos con Certificados</h3>
      </div><!-- /.box-header -->
      
      <div class="box-body table-responsive">
      <!-- <form id="form" name="form" method="POST" action="{{route('validarCertificado')}}"> -->

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table id="tablaBeneficiarios" class="table table-hover">

          <thead>
            <tr>
          
              <th>Carnet</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Estado</th>
              <th>Escuela</th>
              <th>Observaciones</th>
              <th>Expediente</th>
              
             
              <th>Aprobar</th>
              <th>Ver</th>
              <th>Descargar</th>
            </tr>
          </thead>
           <form id="form">
          <tbody>
           @php ($c = 0)
           @foreach($alumnos_escuela as $alumno_escuela)
           @if($alumno_escuela->expediente->totalHoras >= 500)
           <tr>
         
          

            <td id="car{{$c}}">{{$alumno_escuela->carnet}}</td>
            <td id="nom{{$c}}">{{$alumno_escuela->alumno->nombre}}</td>
            <td id="ape{{$c}}">{{$alumno_escuela->alumno->apellido}}</td>
            <td>{{$alumno_escuela->expediente->estado_expediente->nombre}}</td>
            <td id="escuela{{$c}}">{{$alumno_escuela->escuela->nombre}}</td>
            <td>{{$alumno_escuela->expediente->observaciones}}</td>
            <td align="center">
              <a href="{{ route('expedienteVer', ['carnet' => $alumno_escuela->carnet, 'escuela' => $alumno_escuela->escuela->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a> 
  
            </td>


         <!--    @if($alumno_escuela->expediente->certificado == 1)
           <td> <input type="checkbox" id="validar{{$c}}" name="validar{{$c}}" value="{{$alumno_escuela->expediente->certificado}}"  checked="checked" onclick="check()"> </td>
           @else
           <td> <input type="checkbox" value="{{$alumno_escuela->expediente->certificado}}"  id="validar{{$c}}" name="validar{{$c}}" onclick="check()"> 
           </td>
           @endif -->

           

           <!-- <td><button type="button" class="btn btn-block btn-warning btn-xs" value="{{$alumno_escuela->expediente->id}}" onclick="check2(this.value)" >Validar</button></td>
 -->
             @if($alumno_escuela->expediente->certificado == 0)
            <td align="center">
            <button id="{{$c}}" onclick="mostrar(this.id)" type="button" class="btn btn-warning" type="button" data-toggle="modal"
            data-target="#myModal" value="{{$alumno_escuela->expediente->id}}"
             ><span class="fa fa-check"></span>
             </button>
            </td>
             @else

             <td align="center">
            <button type="button"  disabled="true" id="{{$c}}" onclick="mostrar(this.id)" type="button" class="btn btn-warning" data-toggle="modal"
            data-target="#myModal" value="{{$alumno_escuela->expediente->id}}"
             ><span class="fa fa-check"></span>
             </button>
            </td>
            @endif

        <!--  <td>  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Validar
</button> </td> -->

            <td><a href="{{ route('certificado_alumno', ['carnet' => $alumno_escuela->carnet]) }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>

            <td><a href="{{ route('certificado_alumno_descargar', ['carnet' => $alumno_escuela->carnet]) }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

     </tr>        

          @php ($c++)


      
          @endif
           

          @endforeach

          <input type="number" name="counter" id="counter" value="{{$c}}" style="display: none;">
        </tbody>


        </form>
        <tfoot>
        </tfoot>
      </table>
      
     
  <!-- </form> -->
<!-- <button type="button" class="btn btn-primary" id="btn_texto" onclick="guardarDatos();"><i class="fa fa-spinner" aria-hidden="true"></i> Validar Certificados</button>  -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">¿Desea Aprobar el Certificado?</h4>
      </div>
      <form id="prueba" name="prueba" method="POST" action="{{ route('validarCertificado') }}">
              {{ csrf_field() }}

      <div class="modal-body">
        <input style="display: none;" id="idexp" type="text" name="idexp">
        <input style="display:none;" id="boton" name="boton" type="text" name="">
        <Label><b><u><i>Alumno:</i></u> </b></Label>
         <input type="text" name="" id="nombre" style="border:none" readonly  >
       <input type="text" name="apellido" id="apellido" style="border:none" readonly></input> 
       <br/>
        <Label><b><u><i>Carnet:</i></u> </b> </Label>
        <input type="text" name="car" id="car" style="border:none" readonly></input> 
        
        <Label><b><u><i>Escuela:</i> </u> </b></Label>
        <input type="text" name="escuela" id="escuela" style="border:none" readonly></input> 
        
       
        
      </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="guardarDatos()">Aprobar Certificado</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('JSExtras')
<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#tablaBeneficiarios").DataTable(
    {
      language: {
        processing:     "Procesando...",
        search:         "Buscar:",
        lengthMenu:     "Mostrar _MENU_ registros",
        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No se encontraron resultados",
        emptyTable:     "Ningún dato disponible en esta tabla",
        paginate: {
          first:      "Primero",
          previous:   "Anterior",
          next:       "Siguiente",
          last:       "Último"
        },
        aria: {
          sortAscending:  ": Activar para ordenar la columna de manera ascendente",
          sortDescending: ": Activar para ordenar la columna de manera descendente"
        }
      }
    } 
    );
  });

</script>
<script type="text/javascript">

function check()
{
  dd('hola');
    var chkBox = document.getElementById('validar');
    if (chkBox.checked)
    {
        // ..
       alert("Certificado validado");

      

    }
    else { alert("Certificado NO validado")}
}

function check2(m)
{
alert(m);
 // alert("Activaste la funcion miFuncion()");


//var x=document.getElementsByTagName("id");


//alert(dato1);

// variable=document.getElementsByName("id")[0];
  // alert(variable);
        // var id = document.getElementById('id').innerHTML;

   
 

  // var id = document.getElementsByName("id")[0].value;
  //    alert(id);
  
 
}
function mostrar(id){
  
     var exp = document.getElementById(id).value;
     document.getElementById("boton").value = id;
     //alert("id:" +exp);
     document.getElementById("idexp").value = exp;

     var ape = document.getElementById("ape" + id);
     document.getElementById("apellido").value = ape.innerHTML;

     var nom = document.getElementById("nom" + id);
     document.getElementById("nombre").value = nom.innerHTML;

   

     var esc = document.getElementById("escuela" + id);
     document.getElementById("escuela").value = esc.innerHTML;

      var car = document.getElementById("car" + id);
     document.getElementById("car").value = car.innerHTML;

 
}


function guardarDatos() {
        var b = $("#boton").val();
                
        //document.getElementById("boton").value();
        var data = $("#prueba").serialize();
        $.ajax({
            url:"{{ url('/validar') }}",
            type: "POST",
            data: data,
            success:function(data){
                if (data.success){
                    
                    $("#"+ b).attr("disabled", true);

                    // alertify.success('Listo');

                    $('#myModal').modal('hide');
                  //  alertify.success('Current position : ' + alertify.get('notifier','position'));
//alertify.success("Ha ocurrido éxitosamente el proceso.");
//alertify.success('success','success',10, null);
              // alertify.success(data.msg);

                  //alert("Exito");
                }
            }
        });
        
      }
    </script>

<script>
$(document).ready(function (e) {
  $('#myModal').on('show.bs.modal', function(e) {    
     var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#lista').val(id);
  });
});
</script>


@endsection