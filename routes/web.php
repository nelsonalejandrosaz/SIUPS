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
	/********************************
	*Rutas para gestion alumnos
	********************************/
	Route::name('alumnoLista')->get('/alumnos', 'AlumnoController@AlumnosLista');
	Route::name('alumnoCargaCSV')->get('/alumnos/cargaCSV', function () {
	    return view('alumnos.alumnos_carga_masiva');
	})->middleware('coordinador');
	Route::name('alumnoNuevo')->get('/alumnos/nuevo','AlumnoController@registroAlumno')->middleware('coordinador');
	Route::name('alumnoNuevoPost')->post('/alumnos/nuevo','AlumnoController@guardarAlumno')->middleware('coordinador');
	Route::name('alumnoVer')->get('/alumnos/{id}', 'AlumnoController@verAlumno');
	Route::name('alumnoEditar')->get('/alumnos/{id}/editar', 'AlumnoController@editarAlumno')->middleware('coordinador');
	Route::name('alumnoEditarPost')->post('/alumnos/{id}/editar','AlumnoController@editarAlumnoGuardar')->middleware('coordinador');
	Route::name('alumnoCargaCSVPost')->post('import_csv_file', 'AlumnoController@import_csv_file')->middleware('coordinador');
	/********************************
	* Fin Rutas para gestion de roles
	********************************/
});

Route::group(['middleware' => 'admin'], function () {
/********************************
	*Rutas para gestion alumnos
	********************************/
	Route::name('usuarioLista')->get('/usuario', 'UsuarioController@AlumnosLista');
	Route::name('usuarioNuevo')->get('/usuario/nuevo','UsuarioController@registroAlumno');
	Route::name('usuarioNuevoPost')->post('/usuario/nuevo','UsuarioController@guardarAlumno');
	Route::name('usuarioEditar')->get('/usuario/{id}/editar', 'UsuarioController@editarAlumno');
	Route::name('usuarioEditarPost')->post('/usuario/{id}/editar','UsuarioController@editarAlumnoGuardar');
	/********************************
	* Fin Rutas para validar roles
	********************************/
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



Route::get('permisoDenegado', function () {
    return view('errores.permisoDenegado');
});

