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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/alumnos_lista', 'AlumnoController@alumnos_lista');

Route::get('/alumnos_carga_masiva', function () {
    return view('alumnos.alumnos_carga_masiva');
});


Route::post('import_csv_file', 'AlumnoController@import_csv_file');

Route::get('/alumno_registro_manual', 'AlumnoController@registroAlumno');
