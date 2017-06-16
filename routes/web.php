<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/', function () {
    return view('welcome');
});

/********************************
*Rutas para validar roles
********************************/
Route::name('inicioJefe')->get('home/jefe', 'JefeController@index');
Route::name('inicioSecretaria')->get('home/secretaria', 'SecretariaController@index');
Route::name('inicioAdmin')->get('home/admin', 'AdminController@index');
Route::name('inicioCoordinador')->get('home/coordinador', 'CoordinadorController@index');
/********************************
* Fin Rutas para validar roles
********************************/

/********************************
*Rutas para gestion alumnos
********************************/
Route::name('alumnoLista')->get('/alumnos', 'AlumnoController@AlumnosLista');
Route::name('alumnoCargaCSV')->get('/alumnos/cargaCSV', function () {
    return view('alumnos.alumnos_carga_masiva');
});
Route::name('alumnoNuevo')->get('/alumno/nuevo','AlumnoController@registroAlumno');
Route::name('alumnoNuevoPost')->post('/alumnos/nuevo','AlumnoController@guardarAlumno');
Route::name('alumnoVer')->get('/alumnos/{id}', 'AlumnoController@verAlumno');
Route::name('alumnoEditar')->get('/alumnos/{id}/editar', 'AlumnoController@editarAlumno');
Route::post('import_csv_file', 'AlumnoController@import_csv_file');












Route::get('permisoDenegado', function () {
    return view('errores.permisoDenegado');
});








// Route::name('alumno_editar_guardar')->post('/alumno_editar/{id}', 'AlumnoController@editarAlumnoGuardar');


