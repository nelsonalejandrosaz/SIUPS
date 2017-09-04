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
|			***** INDICE *****
|
|	Nombre				N° de linea
|
|1.Gestion Alumnos 			25
|2.Validar roles			61
|3.Rutas para usuarios 		80
|4. Rutas para SS 			101
|5.Rutas para tutores 		110
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


<<<<<<< HEAD
/********************************
*Rutas para Servicio Social
********************************/
Route::name('servicioSocialNuevo')->get('/ServicioSocial/nuevo','ServicioSocialController@registroServicioSocial')->middleware('coordinador');
Route::name('servicioSocialNuevoPost')->post('/ServicioSocial/nuevo','ServicioSocialController@guardarServicioSocial')->middleware('coordinador');

/************************************
*Fin de la rutas para servicio social
*************************************/
});
=======

/******************************************
**      NUEVAS RUTAS PARA USUARIO    Arnulfo   ***
******************************************/

Route::name('usuariosLista')->get('/usuarios', 'UsuarioController@UsuariosLista');

Route::name('agregarusuario')->get('Agregar/usuario','UsuarioController@AgregarUsuario')->middleware('jefe');

Route::name('usuarioNuevoPost')->post('usuarios/nuevo','UsuarioController@guardarusuario')->middleware('jefe');

Route::name('usuarioVer')->get('/usuarios/{id}', 'UsuarioController@verUsuario')->middleware('jefe');

Route::name('usuarioEditar')->get('/usuarios/{id}/editar', 'UsuarioController@editarUsuario')->middleware('jefe');

Route::name('usuarioEditarPost')->post('/usuarios/{id}/editar','UsuarioController@editarUsuarioGuardar')->middleware('jefe');

/******************************************
**     FIN NUEVAS RUTAS PARA USUARIO       ***
******************************************/

/******************************************
**      NUEVAS RUTAS PARA SERVICIO SOCIAL Kevin      ***
******************************************/

Route::name('ServicioSocialNuevo')->get('/ServicioSocial/Nuevo', 'ServicioSocialController@IngresarServicioSocial');




/******************************************
**      NUEVAS RUTAS PARA TUTORES    Arnulfo   ***
******************************************/

Route::name('tutoresLista')->get('/tutores', 'TutorController@TutoresLista');

Route::name('agregarTutor')->get('Agregar/Tutor','TutorController@AgregarTutor')->middleware('coordinador');

Route::name('TutorNuevoPost')->post('Tutores/nuevo','TutorController@guardarTutor')->middleware('coordinador');

Route::name('TutorVer')->get('/Tutores/{id}', 'TutorController@verTutor')->middleware('coordinador');

Route::name('TutorEditar')->get('/Tutores/{id}/editar', 'TutorController@editarTutor')->middleware('coordinador');

	Route::name('TutorEditarPost')->post('/Tutores/{id}/editar','TutorController@editarTutorGuardar')->middleware('coordinador');

/******************************************
**      NUEVAS RUTAS PARA TUTORES       ***
******************************************/


/******************************************
**      NUEVAS RUTAS PARA BENEFICIARIOS  ***
******************************************/
Route::name('beneficiarioLista')->get('/beneficiario', 'BeneficiarioController@BeneficiarioLista');
Route::name('beneficiarioNuevo')->get('/beneficiario/nuevo','BeneficiarioController@BeneficiarioNuevo');
Route::name('beneficiarioNuevoPost')->post('/beneficiario/nuevo','BeneficiarioController@BeneficiarioNuevoPost');
Route::name('beneficiarioEditar')->get('/beneficiario/{id}/editar', 'BeneficiarioController@BeneficiarioEditar');
Route::name('beneficiarioEditarPost')->post('/beneficiario/{id}/editar','BeneficiarioController@BeneficiarioEditarPost');
Route::name('beneficiarioVer')->get('/beneficiario/{id}/ver', 'BeneficiarioController@BeneficiarioVer');


>>>>>>> master
