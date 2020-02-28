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
Route::resource('empresa', 'EmpresaController');
  //Rutas para agregar tipos de transporte y los nombres de los conductores
Route::resource('contacto', 'ContactoController');
