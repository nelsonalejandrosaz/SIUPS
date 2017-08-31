<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                  @if(Auth::user()->rol[0]->nombre =='admin'| Auth::user()->rol[0]->nombre == 'jefe'| Auth::user()->rol[0]->nombre == 'secretaria') 
                    <a href="#"><i class="fa fa-circle text-success"></i>{{Auth::user()->rol[0]->nombre}}</a>
                    @else
                    <a href="#"><i class="fa fa-circle text-success"></i>{{Auth::user()->escuela->nombre}}</a>
                    @endif
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Panel de administracion</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <!-- Links para la gestion de alumnos -->
            @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" || Auth::user()->rol[0]->nombre == "jefe" )
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('alumnoLista') }}">Lista</a></li>
                    @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                        <li><a href="{{ route('alumnoCargaCSV') }}">Cargar CSV</a></li>
                        <li><a href="{{ route('alumnoNuevo') }}">Carga Manual</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- Fin links gestion de alumnos -->
            <!-- Links para la gestion de expedientes -->
            @if( Auth::user()->rol[0]->nombre != "admin" )
            <li class="treeview">
                <a href="#"><i class='fa fa-newspaper-o'></i> <span>Expedientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Lista</a></li>
                    <li><a href="#">Expedientes en curso</a></li>
                </ul>
            </li>
            @endif
            <!-- Fin de Links para la gestion de expedientes -->
            <!-- Links para la gestion de Servicios Sociales -->
            @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" || Auth::user()->rol[0]->nombre == "jefe" )
            <li class="treeview">
                <a href="#"><i class='fa fa-briefcase'></i> <span>Servicios Sociales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Lista Servicios Sociales</a></li>
                    <li><a href="{{route('ServicioSocialNuevo')}}">Ingresar Servicio Social</a></li>
                </ul>
            </li>
            @endif
            <!-- Fin Links para la gestion de Servicios Sociales -->
            <!-- Links para los informes diversos -->
            @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" || Auth::user()->rol[0]->nombre == "jefe" )
            <li class="treeview">
                <a href="#"><i class='fa fa-line-chart'></i> <span>Informes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Lista de informes</a></li>
                    <li><a href="#">Generar Informes</a></li>
                </ul>
            </li>
            @endif
            <!-- Fin Links para los informes diversos -->
            <!-- Links para la gestion de Servicios Sociales -->
            @if( Auth::user()->rol[0]->nombre == "admin" )
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Lista usuarios</a></li>
                    <li><a href="#">Ingresar usuario</a></li>
                </ul>
            </li>
            @endif


            <!-- Links para la gestion de Servicios Sociales -->


            
            <!--Links para el CRUD de usuarios (ARNULFO)-->
            @if( Auth::user()->rol[0]->nombre == "jefe" )
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('usuariosLista') }}">Lista usuarios</a></li>
                    <li><a href="{{ route('agregarusuario') }}">Ingresar usuario</a></li>
                </ul>
            </li>
            @endif

            <!--/Links para el CRUD de usuarios-->

            <!--Links para el CRUD de tutores-->

            @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Tutores</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('tutoresLista') }}">Lista tutores</a></li>
                    <li><a href="{{ route('agregarTutor') }}">Ingresar tutor</a></li>
                </ul>
            </li>
            @endif
            <!--/Links para el CRUD de beneficiarios-->

             @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
            <li class="treeview">
                <a href="#"><i class='fa fa-institution'></i> <span>Beneficiarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('tutoresLista') }}">Lista Beneficiarios</a></li>
                    <li><a href="{{ route('agregarTutor') }}">Ingresar Beneficiario</a></li>
                </ul>
            </li>
            @endif


        </ul><!-- /.sidebar-menu -->


    </section>
    <!-- /.sidebar -->
</aside>
