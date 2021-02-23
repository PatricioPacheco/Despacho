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

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    

    Route::get('/usuarios', 'UserController@index')->name('usuarios')->middleware('verified');
    Route::post('/usuarios','UserController@registrar2')->name('usuarios.add')->middleware('verified');
    Route::get('/habilitar', 'UserController@index2')->name('usuarioshabilitar')->middleware('verified');
    Route::get('/usuarios/{id}/eliminar', 'UserController@delete')->name('usuarios.delete')->middleware('verified');
    Route::get('/habilitar/{id}/rest', 'UserController@restore')->name('usuariosrestore')->middleware('verified');
    Route::post('/editUser/{id}/update', 'UserController@update')->name('usuarios.update')->middleware('verified');

	/** Seccion **/
	Route::get('/secciones', 'SeccionesController@index')->name('secciones')->middleware('verified');
	Route::post('/secciones','SeccionesController@store')->name('secciones.add')->middleware('verified');
	Route::post('/editSecciones/{id}/update', 'SeccionesController@update')->name('secciones.update')->middleware('verified');
	Route::get('/secciones/{id}/destroy', 'SeccionesController@destroy')->name('secciones.delete')->middleware('verified');

    /** Categoria **/
    Route::get('/categoria', 'CategoriasController@index')->name('categoria')->middleware('verified');
    Route::post('/categoria','CategoriasController@store')->name('categoria.add')->middleware('verified');
    Route::post('/editCategoria/{id}/update', 'CategoriasController@update')->name('categoria.update')->middleware('verified');
    Route::get('/categoria/{id}/eliminar', 'CategoriasController@destroy')->name('categoria.delete')->middleware('verified');

    /** Estante **/
	Route::get('/estantes', 'EstantesController@index')->name('estantes')->middleware('verified');
	Route::post('/estantes','EstantesController@store')->name('estantes.add')->middleware('verified');
	Route::post('/editEstantes/{id}/update', 'EstantesController@update')->name('estantes.update')->middleware('verified');
	Route::get('/estantes/{id}/destroy', 'EstantesController@destroy')->name('estantes.delete')->middleware('verified');

	/** Nivel **/
	Route::get('/niveles', 'NivelesController@index')->name('niveles')->middleware('verified');
	Route::post('/niveles','NivelesController@store')->name('niveles.add')->middleware('verified');
	Route::post('/editNiveles/{id}/update', 'NivelesController@update')->name('niveles.update')->middleware('verified');
	Route::get('/niveles/{id}/destroy', 'NivelesController@destroy')->name('niveles.delete')->middleware('verified');

	/** Proveedor **/
	Route::get('/proveedores', 'ProveedoresController@index')->name('proveedores')->middleware('verified');
	Route::post('/proveedores','ProveedoresController@store')->name('proveedores.add')->middleware('verified');
	Route::post('/editProveedores/{id}/update', 'ProveedoresController@update')->name('proveedores.update')->middleware('verified');
	Route::get('/proveedores/{id}/destroy', 'ProveedoresController@destroy')->name('proveedores.delete')->middleware('verified');

    /** Proveedores **/
    Route::get('/prod', 'ProductosController@index')->name('productos')->middleware('verified');
    Route::post('/prod','ProductosController@store')->name('productos.add')->middleware('verified');

    /** Productos **/
    Route::get('/prod', 'ProductosController@index')->name('productos')->middleware('verified');
    Route::post('/prod','ProductosController@store')->name('productos.add')->middleware('verified');
    Route::post('/editProd/{id}/update', 'ProductosController@update')->name('productos.update')->middleware('verified');
	Route::get('/prod/{id}/destroy', 'ProductosController@destroy')->name('productos.delete')->middleware('verified');
    Route::get('/prod/{id}/info','ProductosController@informacion')->name('productos.info')->middleware('verified');
        /** Transportes **/
	Route::get('/transportes', 'TransportesController@index')->name('transportes')->middleware('verified');
	Route::post('/transportes','TransportesController@store')->name('transportes.add')->middleware('verified');
	Route::post('/editTransportes/{id}/update', 'TransportesController@update')->name('transportes.update')->middleware('verified');
	Route::get('/transportes/{id}/destroy', 'TransportesController@destroy')->name('transportes.delete')->middleware('verified');

	/** Clientes **/
	Route::get('/clientes', 'ClientesController@index')->name('clientes')->middleware('verified');
	Route::post('/clientes','ClientesController@store')->name('clientes.add')->middleware('verified');
	Route::post('/editClientes/{id}/update', 'ClientesController@update')->name('clientes.update')->middleware('verified');
	Route::get('/clientes/{id}/destroy', 'ClientesController@destroy')->name('clientes.delete')->middleware('verified');


	/** Empaques **/
	Route::get('/empaques', 'EmpaquesController@index')->name('empaques')->middleware('verified');
	Route::post('/empaques','EmpaquesController@store')->name('empaques.add')->middleware('verified');
	Route::get('/empaques/{id}/destroy', 'EmpaquesController@destroy')->name('empaques.delete')->middleware('verified');



});
