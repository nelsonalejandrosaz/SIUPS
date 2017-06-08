@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<!--controlador de errores-->


  <div class="content">


<!--comienza la vista del formulario de registro alumnos-->

<form  action="{{ route('alumno_registro_manual_bd') }}" method="post">
  {{ csrf_field() }}


    <div class="row">

    <div class="col-lg-3"><!--comienza el id alumnos-->
    <div class="form-group">
      <span class="input-group-addon" id="basic-addon1">ID</span>
      <input type="number"  class="form-control" name="id" placeholder="ID del usuario" aria-describedby="basic-addon1">
    </div>
    </div>

<div class="col-lg-3"><!--carnet-->
  <div class="form-group">
    <span class="input-group-addon" id="basic-addon1">Carnet</span>
    <input type="text" name="carnet" class="form-control" placeholder="Carnet del Alumno" aria-describedby="basic-addon1">
  </div>
  </div>
  </div>

<br>
  <div class="row">
  <div class="col-lg-4"><!--datos de los alumnos-->
  <div class="form-group">
    <span class="input-group-addon" id="basic-addon1">Nombre</span>
    <input type='text' name="nombre" class="form-control" placeholder="Nombre del Alumno" aria-describedby="basic-addon1">
  </div>
  </div>
<div class="col-lg-4">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">Apellido</span>
  <input type="text" name="apellido" class="form-control" placeholder="Apellidodel Alumno" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">telefono</span>
  <input type="text" name="telefono" class="form-control" placeholder="Telefono del Alumno" aria-describedby="basic-addon1">
</div>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-8">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">Lugar de trabajo</span>
  <input type="text" name="lugar_trabajo" class="form-control" placeholder="lugar de trabajo" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">telefono de trabajo</span>
  <input type="text" name="telefono_trabajo" class="form-control" placeholder="Telefono de trabajo" aria-describedby="basic-addon1">
</div>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">Correo</span>
  <input type="text" name="correo" class="form-control" placeholder="Correo del Alumno" aria-describedby="basic-addon1">
</div>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
  <span class="input-group-addon" id="basic-addon1">Direccion</span>
  <input type="text" name="direccion" class="form-control" placeholder="Direccion del Alumno" aria-describedby="basic-addon1">
</div>
</div>
</div>

<br>
<div class="form-group">
<button type="submit" class="btn btn-primary">Ingresar Alumno</button>
</div>

</form><!--final de la captura de datos-->
</div><!--final del contenedor-->
@endsection
