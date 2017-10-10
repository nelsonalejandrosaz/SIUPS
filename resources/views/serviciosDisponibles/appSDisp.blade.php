<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-green sidebar-mini">
<div id="app" v-cloak>
   <!--SE LE QUITO EL WRAPER PARA CAMBIARLE EL COLOR DE FONDO-->

   

   

    <!-- Content Wrapper. Contains page content -->
   

     <div class="col-md-12">   

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
   <!-- /.content-wrapper -->

  
    @include('serviciosDisponibles.footerDisp')

   
</div>

</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
