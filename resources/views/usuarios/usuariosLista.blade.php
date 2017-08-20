@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.alumnoslista') }}
@endsection

@section('contentheader_title', 'Lista de alumnos')
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
          <h3 class="box-title">Lista de alumnos</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaAlumnos" class="table table-hover">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>escuela</th>
              </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $usuario)
              <tr>
              <td>{{$usuario->username}}</td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->apellido}}</td>
              <td>{{$usuario->rol_id}}</td>
              <td align="center">
                @if( Auth::user()->rol[0]->nombre == "jefe" )
                <a href="{{ route('alumnoEditar', ['id' => $usuario->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                @endif  
                <a href="{{ route('alumnoVer', ['id' => $usuario->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a>
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
