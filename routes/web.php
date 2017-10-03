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
|3. Rutas para SS 			80
|4.Rutas para usuarios 		90
|5.Rutas para tutores 		110
|
*/
/********************************
*Rutas para Servicio Sociales Disponibles al publico
********************************/
Route::name('serviciosDisponibles')->get('/serviciosDisponibles','ServicioSocialController@ServiciosDisponibles');
Route::name('serviciosDisponiblesVer')->get('/serviciosDisponibles/{id}/ver','ServicioSocialController@ServiciosDisponiblesVer');
/**********************************
**********************************/

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
	Route::name('alumnoVer')->get('/alumnos/{carnet}', 'AlumnoController@verAlumno')->middleware('Jefe_Coordinador');
	Route::name('alumnoEditar')->get('/alumnos/{carnet}/editar', 'AlumnoController@editarAlumno')->middleware('coordinador');
	Route::name('alumnoEditarPost')->post('/alumnos/{carnet}/editar','AlumnoController@editarAlumnoGuardar')->middleware('coordinador');
	Route::name('alumnoCargaCSVPost')->post('import_csv_file', 'AlumnoController@import_csv_file')->middleware('coordinador');
	/********************************
	* Fin Rutas para gestion alumnos
	********************************/
});

Route::group(['middleware' => 'admin'], function () {
/********************************
	*Rutas para gestion Usuario
	********************************/
	Route::name('usuarioLista')->get('/usuario', 'UsuarioController@AlumnosLista');
	Route::name('usuarioNuevo')->get('/usuario/nuevo','UsuarioController@registroAlumno');
	Route::name('usuarioNuevoPost')->post('/usuario/nuevo','UsuarioController@guardarAlumno');
	Route::name('usuarioEditar')->get('/usuario/{id}/editar', 'UsuarioController@editarAlumno');
	Route::name('usuarioEditarPost')->post('/usuario/{id}/editar','UsuarioController@editarAlumnoGuardar');
	/********************************
	* Fin Rutas para gestion Usuario
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

Route::name('permisoDenegado')->get('permisoDenegado', function () {
    return view('errores.permisoDenegado');

});


/******************************************
**      NUEVAS RUTAS PARA USUARIO    Arnulfo   ***
******************************************/

Route::name('usuariosLista')->get('/usuarios', 'UsuarioController@UsuariosLista')->middleware('jefe');

Route::name('agregarusuario')->get('Agregar/usuario','UsuarioController@AgregarUsuario')->middleware('jefe');

Route::name('usuarioNuevoPost')->post('usuarios/nuevo','UsuarioController@guardarusuario')->middleware('jefe');

Route::name('usuarioVer')->get('/usuarios/{id}', 'UsuarioController@verUsuario')->middleware('jefe');

Route::name('usuarioEditar')->get('/usuarios/{id}/editar', 'UsuarioController@editarUsuario')->middleware('jefe');

Route::name('usuarioEditarPost')->post('/usuarios/{id}/editar','UsuarioController@editarUsuarioGuardar')->middleware('jefe');

/******************************************
**     FIN NUEVAS RUTAS PARA USUARIO       ***
******************************************/

/******************************************
**      NUEVAS RUTAS PARA TUTORES      ***
******************************************/

Route::name('tutoresLista')->get('/tutores', 'TutorController@TutoresLista')->middleware('Jefe_Coordinador');

Route::name('agregarTutor')->get('Agregar/Tutor','TutorController@AgregarTutor')->middleware('coordinador');

Route::name('TutorNuevoPost')->post('Tutores/nuevo','TutorController@guardarTutor')->middleware('coordinador');

Route::name('TutorVer')->get('/Tutores/{id}', 'TutorController@verTutor')->middleware('Jefe_Coordinador');

Route::name('TutorEditar')->get('/Tutores/{id}/editar', 'TutorController@editarTutor')->middleware('coordinador');

	Route::name('TutorEditarPost')->post('/Tutores/{id}/editar','TutorController@editarTutorGuardar')->middleware('coordinador');

/******************************************
**      NUEVAS RUTAS PARA TUTORES       ***
******************************************/


/******************************************
**      NUEVAS RUTAS PARA BENEFICIARIOS  ***
******************************************/
Route::name('beneficiarioLista')->get('/beneficiario', 'BeneficiarioController@BeneficiarioLista')->middleware('Jefe_Coordinador');
Route::name('beneficiarioNuevo')->get('/beneficiario/nuevo','BeneficiarioController@BeneficiarioNuevo')->middleware('coordinador');
Route::name('beneficiarioNuevoPost')->post('/beneficiario/nuevo','BeneficiarioController@BeneficiarioNuevoPost')->middleware('coordinador');
Route::name('beneficiarioEditar')->get('/beneficiario/{id}/editar', 'BeneficiarioController@BeneficiarioEditar')->middleware('coordinador');
Route::name('beneficiarioEditarPost')->post('/beneficiario/{id}/editar','BeneficiarioController@BeneficiarioEditarPost')->middleware('coordinador');
Route::name('beneficiarioVer')->get('/beneficiario/{id}/ver', 'BeneficiarioController@BeneficiarioVer')->middleware('Jefe_Coordinador');



/********************************
*Rutas para Servicio Social 
********************************/
Route::name('servicioSocialLista')->get('/ServicioSocial/Lista','ServicioSocialController@ServicioSocialLista')->middleware('Jefe_Coordinador');
Route::name('servicioSocialNuevo')->get('/ServicioSocial/nuevo','ServicioSocialController@ServicioSocialRegistro')->middleware('coordinador');
Route::name('servicioSocialNuevoPost')->post('/ServicioSocial/nuevo','ServicioSocialController@ServicioSocialGuardar')->middleware('coordinador');
Route::name('servicioSocialEditar')->get('/ServicioSocial/{id}/editar', 'ServicioSocialController@ServicioSocialEditar');
Route::name('servicioSocialEditarPost')->post('/ServicioSocial/{id}/editar','ServicioSocialController@ServicioSocialEditarPost');
Route::name('servicioSocialVer')->get('/ServicioSocial/{id}/ver', 'ServicioSocialController@ServicioSocialVer');
/************************************
*Fin de la rutas para servicio social
*************************************/

/********************************
*Rutas para Expediente
********************************/
Route::name('expedienteLista')->get('/expediente', 'ExpedienteController@ExpedienteLista')->middleware('Jefe_Coordinador');
Route::name('expedienteVer')->get('/expediente/{carnet}','ExpedienteController@ExpedienteVer')->middleware('Jefe_Coordinador');
/************************************
*Fin de la rutas para expediente
*************************************/

/****************************************
*Rutas para Asignacion de Servicio Social
***************************************/
Route::name('asignacionServicio')->get('/asignacion','AsignacionServicioController@AsignacionServicio')->middleware('coordinador');
Route::name('asignacionServicio')->post('/asignacion','AsignacionServicioController@AsignacionGuardar')->middleware('coordinador');
/************************************
*Fin de la rutas para asignacion de servicio social
*************************************/


// Rutas para buscar municipios
Route::name('municipiosPorDep')->get('/municipios/{id}', 'ServicioSocialController@municipiosPorDepartamento');