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
	{{-- Cuadro estadistica alumno --}}
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Estadisticas alumnos</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<div class="btn-group">
							<button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">

						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>{{$estadisticas->numeroAlumnos}}</h3>

									<p>Alumnos registrados</p>
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
									<h3>{{$estadisticas->numeroExpCurso}}</h3>

									<p>Expedientes en curso</p>
								</div>
								<div class="icon">
									<i class="fa fa-play"></i>
								</div>
								<a href="{{route('servicioSocialLista')}}" class="small-box-footer">Ver lista <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-navy-active">
								<div class="inner">
									<h3>{{$estadisticas->numeroExpFinal}}</h3>

									<p>Expedientes finalizados</p>
								</div>
								<div class="icon">
									<i class="fa fa-check-circle"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>{{$estadisticas->numeroExpNoAbierto}}</h3>

									<p>Expedientes no abiertos</p>
								</div>
								<div class="icon">
									<i class="fa fa-stop"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->

					</div><!-- /.row -->
				</div><!-- ./box-body -->
				<div class="box-footer">
					<div class="row">

					</div><!-- /.row -->
				</div><!-- /.box-footer -->
			</div><!-- /.box -->
		</div>	
	</div>
	{{-- Fin cuadro estadistica alumno --}}

	{{-- Cuadro estadisticas espedientes --}}
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Estadisticas servicios sociales</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<div class="btn-group">
							<button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="row">

						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>{{$estadisticas->numeroSSDisponible}}</h3>
									<p>Disponibles</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-plus-sign"></i>
								</div>
								<a href="{{route('alumnoLista')}}" class="small-box-footer">Ver lista <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3>{{$estadisticas->numeroSSEnCurso}}</h3>
									<p>En curso</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-road"></i>
								</div>
								<a href="{{route('servicioSocialLista')}}" class="small-box-footer">Ver lista <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-navy-active">
								<div class="inner">
									<h3>{{$estadisticas->numeroSSFinal}}</h3>
									<p>Finalizados</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-ok-sign"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>{{$estadisticas->numeroSSAbandonado}}</h3>
									<p>Abandonados</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->

					</div><!-- /.row -->
				</div><!-- ./box-body -->
				<div class="box-footer">
					<div class="row">

					</div><!-- /.row -->
				</div><!-- /.box-footer -->
			</div><!-- /.box -->
		</div>	
	</div>
	{{-- Fin cuadro estadisticas expedientes --}}

</div>
@endsection
