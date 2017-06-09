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

Route::get('/', function () {
    return view('welcome');
});

Route::name('alumno_registro_manual_bd')->post('/alumno_registro_manual','AlumnoController@guardarAlumno');
Route::get('/alumno_registro_manual','AlumnoController@registroAlumno');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('alumnos_lista/{exito?}', 'AlumnoController@AlumnosLista');


Route::get('/alumnos_carga_masiva', function () {
    return view('alumnos.alumnos_carga_masiva');
});


Route::post('import_csv_file', 'AlumnoController@import_csv_file');

Route::get('/alumno_registro_manual', 'AlumnoController@registroAlumno');

Route::name('alumno_editar')->get('/alumno_editar/{id}', 'AlumnoController@editarAlumno');

Route::name('alumno_editar_guardar')->post('/alumno_editar/{id}', 'AlumnoController@editarAlumnoGuardar');

Route::name('alumno_ver')->get('/alumno_ver/{id}', 'AlumnoController@verAlumno');
