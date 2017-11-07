@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! No tienes permiso para ver esto!!</h3>
            <p>
                Al parecer careces de suficientes permisos para ver este contenido. 
                Mientras tanto, es posible volver al panel.
                <a href='{{ url('/home') }}'>Volver al inicio</a>
                <br>
                <br>
                <br>
                <br>
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection