<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriasController;

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

Route::get('/default', function () {
    return view('welcome');
});

Route::get('/backend', [Controller::class, 'linkBackend']);
Route::get('/backend/productos', [ProductoController::class, 'mostrarAllProductos']);


Route::get('/', [Controller::class, 'linkInicio']);

Route::get('/entrar', [Controller::class, 'linkEntrar']);

Route::get('/registrar', [Controller::class, 'linkRegistrar']);

Route::get('/salir', [Controller::class, 'salir']);

Route::get('/opcion/{value}', [CategoriasController::class, 'mostrarProductos']);

Route::get('/getCategorias', [CategoriasController::class, 'getCategorias']);

Route::get('/producto', [Controller::class, 'linkProducto']);

Route::get('/producto/{nombre}', [ProductoController::class, 'mostrarProducto']);

Route::get('/añadirCarrito/{nombre}/{precio}', [ProductoController::class, 'añadirCarrito']);

Route::get('/carrito', [Controller::class, 'linkCarrito']);

Route::post('/buscador', [ProductoController::class, 'buscar'])
->name('buscador');

Route::post('/comprobarLogin', [UsuarioController::class, 'comprobarLogin'])
->name('comprobarLogin');

Route::post('/comprobarRegistro', [UsuarioController::class, 'comprobarRegistro'])
->name('comprobarRegistro');