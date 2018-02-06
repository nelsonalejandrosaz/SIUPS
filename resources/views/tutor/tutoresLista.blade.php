@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.tutoreslista') }}
@endsection

@section('contentheader_title', 'Lista de Tutores')
@section('contentheader_description', '')


@section('main-content')


	<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de tutores</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaTutores" class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dui</th>
                <th>Email</th>
								<th style="width:15% ">Especialidad</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tutores as $tutor)
              <tr>
              <td>{{$tutor->nombre}}</td>
              <td>{{$tutor->apellido}}</td>
              <td>{{$tutor->dui}}</td>
              <td>{{$tutor->correo}}</td>
							<td>{{$tutor->especialidad_id}}</td>
              <td align="center">
                @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                <a href="{{ route('TutorEditar', ['id' => $tutor->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                @endif
                <a href="{{ route('TutorVer', ['id' => $tutor->id]) }}" class="btn btn-info"><span class="fa fa-eye"></span></a>
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

@endsection
