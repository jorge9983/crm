<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Rutas de Empresas
Route::resource('/empresas', 'EmpresaController');

Route::get('/', 'EmpresaController@index')->name('empresas');

Route::get('/empresas/{id}', 'EmpresaController@detalle')->name('empresas.detalle');

Route::get('/empresas/{id}/edit', 'EmpresaController@detalle')->name('empresas.edit');

Route::get('/empresas/{id}/destroy', 'EmpresaController@destroy')->name('empresas.destroy');


//Rutas de Empleados
Route::resource('/empleados', 'EmpleadoController');

Route::get('/empleados', 'EmpleadoController@index')->name('empleados');

Route::get('/empleados/{id}', 'EmpleadoController@show')->name('empleados.show');

Route::get('/empleados/{id}/edit', 'EmpleadoController@detalle')->name('empleados.edit');

Route::get('/empleados/{id}/destroy', 'EmpleadoController@destroy')->name('empleados.destroy');
