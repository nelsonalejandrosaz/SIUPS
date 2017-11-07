@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}</h3>
            <p>
                No hemos podido encontrar la página que estabas buscando. 
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