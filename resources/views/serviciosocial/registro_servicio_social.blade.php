@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title', 'Ingreso de Servicio Social')
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

@if(session()->has('advertencia'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>  <i class="icon fa fa-check"></i> Error</h4>
      {{ session()->get('advertencia') }}
    </div>
@endif

<!--comienza la vista del formulario de registro alumnos-->
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->

    <h1>Me vale pija, ya funcionó</h1>
              <!-- /.box -->
  </div>
</div>

@endsection