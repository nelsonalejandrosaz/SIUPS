@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.beneiciarioslista') }}
@endsection

@section('contentheader_title', 'Lista de beneficiarios')
@section('contentheader_description', '')


@section('main-content')

@if(session()->has('mensaje'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Exito</h4>
      {{ session()->get('mensaje') }}
    </div>
  @endif
 
	<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Beneficiarios</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaBeneficiarios" class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Organizacion</th>
                <th>Tel Organizacion</th>
              </tr>
            </thead>
            <tbody>
             @foreach($beneficiarios as $beneficiario)
              <tr>
              <td>{{$beneficiario->nombre}}</td>
              <td>{{$beneficiario->apellido}}</td>
              <td>{{$beneficiario->dui}}</td>
              <td>{{$beneficiario->correo}}</td>
              <td>{{$beneficiario->telefono}}</td>
              <td>{{$beneficiario->organizacion}}</td>
              <td>{{$beneficiario->telefonoOrganizacion}}</td>


              <td align="center">
                @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                <a href="{{ route('beneficiarioEditar', ['id' => $beneficiario->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                @endif  
                <a href="{{ route('beneficiarioVer', ['id' => $beneficiario->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a> 
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

  <!-- <script>
    $(document).ready(function(){
    $('#tablaAlumnos').DataTable();
    });
  </script> -->

@endsection
