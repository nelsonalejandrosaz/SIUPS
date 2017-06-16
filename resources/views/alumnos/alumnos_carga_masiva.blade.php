@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Carga de alumnos')
@section('contentheader_description', '')


@section('main-content')
	<div class="col-md-12">


      <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Cargar Datos de Usuarios</h3>
                      </div><!-- /.box-header -->
     
      <div id="notificacion_resul_fcdu"></div>

      <form  id="f_cargar_datos_usuarios" name="f_cargar_datos_usuarios" method="post"  action="import_csv_file" class="formarchivo" enctype="multipart/form-data" >                
      
      
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