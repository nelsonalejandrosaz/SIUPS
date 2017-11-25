@extends('adminlte::layouts.app')

{{-- Titulo de la pagina --}}
@section('htmlheader_title')
    Lista de Servicios Sociales
@endsection

{{-- Seccion para agregar estilos CSS extras a los que se cargan por defecto --}}
@section('CSSExtras')

@endsection

{{-- Titulo del header --}}
@section('contentheader_title')
    Lista de Servicios Sociales
@endsection

{{-- Descripcion del header OPCIONAL --}}
@section('contentheader_description')

@endsection

{{-- Seccion principal de la aplicacion --}}
@section('main-content')

    {{-- Include de los mensajes de errror --}}
    @include('partials.alertamensajes')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Lista de Servicio Social</h3>
                    <a href="{{ route('servicioSocialNuevo') }}" class="btn btn-md btn-primary pull-right"><span
                                class="fa fa-plus"></span> Servicio Social Nuevo</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tablaServicioSocial" class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:30%">Nombre</th>
                            <th style="width:10% ">Beneficiario</th>
                            <th style="width:10%">Municipio</th>
                            <th style="width:8%">Estudiantes Requeridos</th>
                            <th style="width:10%">Estado</th>
                            <th style="width:15% ">Accion</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($serviciossociales as $serviciosocial)
                            <tr>
                                <td>{{$serviciosocial->nombre}}</td>
                                <td>{{$serviciosocial->beneficiario->nombre}}</td>
                                <td>{{$serviciosocial->municipio->nombre}}</td>
                                <td>{{$serviciosocial->numero_estudiantes}}</td>
                                <td>{{$serviciosocial->estado->nombre}}</td>
                                <td align="center">
                                    @if( Auth::user()->rol[0]->nombre == "coordinador_Sups" )
                                        <a href="{{ route('asignacionServicio', ['id' => $serviciosocial->id]) }}"
                                           class="btn btn-success"><span class="fa fa-user-plus"></span></a>
                                        <a href="{{ route('servicioSocialEditar', ['id' => $serviciosocial->id]) }}"
                                           class="btn btn-warning"><span class="fa fa-edit"></span></a>
                                    @endif
                                    <a href="{{ route('servicioSocialVer', ['id' => $serviciosocial->id]) }}"
                                       class="btn btn-info"><span class="fa fa-eye"></span></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>


                        <tfoot>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection

@section('JSExtras')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#tablaServicioSocial").DataTable(
                {
                    language: {
                        processing: "Procesando...",
                        search: "Buscar:",
                        lengthMenu: "Mostrar _MENU_ registros",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        infoPostFix: "",
                        loadingRecords: "Cargando...",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "Ningún dato disponible en esta tabla",
                        paginate: {
                            first: "Primero",
                            previous: "Anterior",
                            next: "Siguiente",
                            last: "Último"
                        },
                        aria: {
                            sortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sortDescending: ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                }
            );
        });
    </script>
@endsection
