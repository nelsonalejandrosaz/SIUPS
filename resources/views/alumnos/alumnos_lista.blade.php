@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de alumnos</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Carnet</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Escuela</th>
                      <th>Accion</th>
                    </tr>
                    <tr>
                      <td>AA17001</td>
                      <td>Aranda Aranda</td>
                      <td>Jose jose</td>
                      <td>Sistemas Informaticos</span></td>
                      <td><a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>  <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a></td>
                    </tr>
                    <!-- Eliminar despues solo para ver vista  -->
                    <tr>
                      <td>AA17001</td>
                      <td>Aranda Aranda</td>
                      <td>Jose jose</td>
                      <td>Sistemas Informaticos</span></td>
                      <td><a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>  <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a></td>
                    </tr>
                    <tr>
                      <td>AA17001</td>
                      <td>Aranda Aranda</td>
                      <td>Jose jose</td>
                      <td>Sistemas Informaticos</span></td>
                      <td><a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>  <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a></td>
                    </tr>
                    <tr>
                      <td>AA17001</td>
                      <td>Aranda Aranda</td>
                      <td>Jose jose</td>
                      <td>Sistemas Informaticos</span></td>
                      <td><a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>  <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a></td>
                    </tr>
                    <!-- fin eliminar -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

@endsection
