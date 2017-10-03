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



@endsection

{{-- Seccion para insertar JS extras a los que se cargan por defecto --}}
@section('JSExtras')
<!-- Select2 -->
<script src="{{asset('/plugins/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    $select2Dep = $('#select2Dep');
    $select2Mup = $('#select2Mup');
    // $select2Dep.select2();
    // $select2Mup.select2();

    $select2Dep.change(function(event){
      $.get("/municipios/"+$select2Dep.val(),function(response,state){
        $select2Mup.select2('destroy');
        $select2Mup.empty();
        for (var i = 0; i < response.length; i++) {
          $('#select2Mup').append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
        }
        $select2Mup.select2();
      })
    })

  });
</script>
@endsection

