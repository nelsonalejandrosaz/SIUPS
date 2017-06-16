@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Carga de alumnos')
@section('contentheader_description', '')

@section('main-content')
@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      @foreach($errors->all() as $error)
      <li>{{$error}} 
      </li> @endforeach
    </div>
  @endif
	<div class="col-md-12">


      <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Cargar Datos de Usuarios</h3>
                      </div><!-- /.box-header -->
     
      <div id="notificacion_resul_fcdu"></div>

      <form  id="f_cargar_datos_usuarios" name="f_cargar_datos_usuarios" method="post"  action="{{ route('alumnoCargaCSVPost') }}" class="formarchivo" enctype="multipart/form-data" >                
      
      
       <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

      <div class="box-body">

     

      <div class="form-group col-xs-12"  >
             <label>Agregar Archivo de Excel </label>
              <input name="csv_file" id="csv_file" type="file" /><br /><br />
      </div>

     
      <div class="box-footer">
        <button type="submit" class="btn btn-lg btn-default">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-success pull-right">Cargar alumnos</button>
      </div><!-- /.box-footer -->
       


      </div>

      </form>

      </div>

  </div>
@endsection
