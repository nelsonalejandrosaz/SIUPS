@extends('adminlte::layouts.app')

@section('htmlheader_title')
home
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')
<!-- Ionicons -->
{{-- <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
<link rel="stylesheet" href="{{ asset('/plugins/ionicons/css/ionicons.min.css') }}">
@endsection


@section('enlaces_menu_opcionales')
<li><a href="#"><i class='fa fa-link'></i> <span>este es del coordinador</span></a></li>
<li><a href="#"><i class='fa fa-link'></i> <span>este es otro del coordinador</span></a></li>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$numeroAlumnos}}</h3>

					<p>Alumnos inscritos</p>
				</div>
				<div class="icon">
					<i class="fa fa-group"></i>
				</div>
				<a href="{{route('alumnoLista')}}" class="small-box-footer">Ver lista <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$numeroSS}}</h3>

					<p>Servicios Sociales</p>
				</div>
				<div class="icon">
					<i class="fa fa-institution"></i>
				</div>
				<a href="{{route('servicioSocialLista')}}" class="small-box-footer">Ver lista <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>44</h3>

					<p>User Registrations</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>65</h3>

					<p>Unique Visitors</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
</div>
@endsection
