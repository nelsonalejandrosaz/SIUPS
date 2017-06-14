@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    Permiso negado
@endsection

@section('main-content')
<img src="{{ asset('/img/acceso_negado.jpg') }}" class="img-responsive" style="margin-left:auto; margin-right:auto;"></img>
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! No tienes permisos para estar aqui!</h3>

        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection
