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
Route::get('/serviciosDisponibles', 'ServicioSocialController@ServiciosDisponibles')->name('serviciosDisponibles');
Route::get('/serviciosDisponibles/{id}/ver', 'ServicioSocialController@ServiciosDisponiblesVer')->name('serviciosDisponiblesVer');
/**********************************
 **********************************/

Route::group(['middleware' => 'auth'], function () {

    /********************************
     *Rutas para gestion alumnos
     ********************************/
    Route::get('/alumno', 'AlumnoController@AlumnosLista')->name('alumnoLista');
    Route::get('/alumno/cargaCSV', 'AlumnoController@AlumnoNuevoCVS')->name('alumnoNuevoCSV');
    Route::post('/alumno/cargaCSV', 'AlumnoController@AlumnoNuevoCVSPost')->name('alumnoNuevoCSVPost');
    Route::get('/alumno/nuevo', 'AlumnoController@AlumnoNuevo')->name('alumnoNuevo');
    Route::post('/alumno/nuevo', 'AlumnoController@AlumnoNuevoPost')->name('alumnoNuevoPost');
    Route::get('/alumno/{carnet}', 'AlumnoController@AlumnoVer')->name('alumnoVer');
    Route::get('/alumno/{carnet}/editar', 'AlumnoController@AlumnoEditar')->name('alumnoEditar');
    Route::post('/alumno/{carnet}/editar', 'AlumnoController@AlumnoEditarPost')->name('alumnoEditarPost');
    /********************************
     * Fin Rutas para gestion alumnos
     ********************************/

    /********************************
     *Rutas para gestion Usuario
     ********************************/
    Route::get('/usuario', 'UsuarioController@AlumnosLista')->name('usuarioLista');
    Route::get('/usuario/nuevo', 'UsuarioController@registroAlumno')->name('usuarioNuevo');
    Route::post('/usuario/nuevo', 'UsuarioController@guardarAlumno')->name('usuarioNuevoPost');
    Route::get('/usuario/{id}/editar', 'UsuarioController@editarAlumno')->name('usuarioEditar');
    Route::post('/usuario/{id}/editar', 'UsuarioController@editarAlumnoGuardar')->name('usuarioEditarPost');
    /********************************
     * Fin Rutas para gestion Usuario
     ********************************/

    /********************************
     *Rutas para validar roles
     ********************************/
    Route::get('home/jefe', 'JefeController@index')->name('inicioJefe');
    Route::get('home/secretaria', 'SecretariaController@index')->name('inicioSecretaria');
    Route::get('home/admin', 'AdminController@index')->name('inicioAdmin');
    Route::get('home/coordinador', 'CoordinadorController@index')->name('inicioCoordinador');
    /********************************
     * Fin Rutas para validar roles
     ********************************/

    /******************************************
     **      NUEVAS RUTAS PARA USUARIO    Arnulfo   ***
     ******************************************/

    Route::get('/usuarios', 'UsuarioController@UsuariosLista')->name('usuariosLista');

    Route::get('Agregar/usuario', 'UsuarioController@AgregarUsuario')->name('agregarusuario');

    Route::post('usuarios/nuevo', 'UsuarioController@guardarusuario')->name('usuarioNuevoPost');

    Route::get('/usuarios/{id}', 'UsuarioController@verUsuario')->name('usuarioVer');

    Route::get('/usuarios/{id}/editar', 'UsuarioController@editarUsuario')->name('usuarioEditar');

    Route::post('/usuarios/{id}/editar', 'UsuarioController@editarUsuarioGuardar')->name('usuarioEditarPost');

    /******************************************
     **     FIN NUEVAS RUTAS PARA USUARIO       ***
     ******************************************/

    /******************************************
     **      NUEVAS RUTAS PARA TUTORES      ***
     ******************************************/

    Route::get('/tutores', 'TutorController@TutoresLista')->name('tutorLista');
    Route::get('Agregar/Tutor', 'TutorController@AgregarTutor')->name('tutorNuevo');
    Route::post('Tutores/nuevo', 'TutorController@guardarTutor')->name('tutorNuevoPost');
    Route::get('/Tutores/{id}', 'TutorController@verTutor')->name('TutorVer');
    Route::get('/Tutores/{id}/editar', 'TutorController@editarTutor')->name('TutorEditar');
    Route::post('/Tutores/{id}/editar', 'TutorController@editarTutorGuardar')->name('TutorEditarPost');

    /******************************************
     **      NUEVAS RUTAS PARA TUTORES       ***
     ******************************************/


    /******************************************
     **      NUEVAS RUTAS PARA BENEFICIARIOS  ***
     ******************************************/
    Route::get('/beneficiario', 'BeneficiarioController@BeneficiarioLista')->name('beneficiarioLista');
    Route::get('/beneficiario/nuevo', 'BeneficiarioController@BeneficiarioNuevo')->name('beneficiarioNuevo');
    Route::post('/beneficiario/nuevo', 'BeneficiarioController@BeneficiarioNuevoPost')->name('beneficiarioNuevoPost');
    Route::get('/beneficiario/{id}/editar', 'BeneficiarioController@BeneficiarioEditar')->name('beneficiarioEditar');
    Route::post('/beneficiario/{id}/editar', 'BeneficiarioController@BeneficiarioEditarPost')->name('beneficiarioEditarPost');
    Route::get('/beneficiario/{id}/ver', 'BeneficiarioController@BeneficiarioVer')->name('beneficiarioVer');


    /********************************
     *Rutas para Servicio Social
     ********************************/
    Route::get('/ServicioSocial/Lista', 'ServicioSocialController@ServicioSocialLista')->name('servicioSocialLista');
    Route::get('/ServicioSocial/nuevo', 'ServicioSocialController@ServicioSocialRegistro')->name('servicioSocialNuevo');
    Route::post('/ServicioSocial/nuevo', 'ServicioSocialController@ServicioSocialGuardar')->name('servicioSocialNuevoPost');
    Route::get('/ServicioSocial/{id}/editar', 'ServicioSocialController@ServicioSocialEditar')->name('servicioSocialEditar');
    Route::post('/ServicioSocial/{id}/editar', 'ServicioSocialController@ServicioSocialEditarPost')->name('servicioSocialEditarPost');
    Route::get('/ServicioSocial/{id}/ver', 'ServicioSocialController@ServicioSocialVer')->name('servicioSocialVer');
    /************************************
     *Fin de la rutas para servicio social
     *************************************/

    /********************************
     *Rutas para Expediente
     ********************************/
    Route::get('/expediente', 'ExpedienteController@ExpedienteLista')->name('expedienteLista');
    Route::get('/expediente/{carnet}/{escuela}', 'ExpedienteController@ExpedienteVer')->   name('expedienteVer');
    /************************************
     *Fin de la rutas para expediente
     *************************************/

    /****************************************
     *Rutas para Asignacion de Servicio Social
     ***************************************/
    Route::get('/asignacion/{id}', 'AsignacionServicioController@AsignacionServicio')->name('asignacionServicio');
    Route::post('/asignacion', 'AsignacionServicioController@AsignacionServicioPost')->name('asignacionServicioPost');
    Route::delete('/asignacion/{id}', 'AsignacionServicioController@AsignacionServicioEliminar')-> name('asignacionServicioEliminar');

    // Rutas para buscar municipios
    Route::get('/municipios/{id}', 'ServicioSocialController@municipiosPorDepartamento')->name('municipiosPorDep');


    //rutas para certificado
    Route::get('/certificado/lista', 'PdfController@CertificadosLista')->name('certificadoLista');
    Route::get('/certificado/{carnet}', 'PdfController@pdfview')->name('certificado_alumno');
    Route::get('/certificado_descargar/{carnet}', 'PdfController@pdfdescargar')->name('certificado_alumno_descargar');
    Route::post('/validar', 'ExpedienteController@validarCertificado')->name('validarCertificado');


    //rutas para reporte
    Route::get('/reportes/index', 'ReporteController@reporteIndex')->name('reporteIndex');
    Route::post('/reportes/post', 'ReporteController@reporte')->name('reporte');
    Route::post('/reportes/descargar', 'ReporteController@reporteDescargar')->name('reporteDescargar');
    Route::get('/reportes/{anio}', 'ReporteController@pdfview')->name('reporteAnio');
    Route::get('/reportes/{anio}/descargar', 'ReporteController@pdfdescargar')->name('reporte_descargar');

});


Route::get('/', function () {
    return view('welcome');
});



Route::name('permisoDenegado')->get('permisoDenegado', function () {
    return view('errores.permisoDenegado');

});





/************************************
 *Fin de la rutas para asignacion de servicio social
 *************************************/

Route::get('error', function () {
    abort(404);
});


