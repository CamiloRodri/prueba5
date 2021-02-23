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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
* Categoria
*/
Route::get('/categoriaver', 'App\Http\Controllers\CategoriaController@index');
Route::post('/categoriacrear', 'App\Http\Controllers\CategoriaController@store');
Route::put('/categoriamodificar', 'App\Http\Controllers\CategoriaController@update');
Route::delete('/categoriaeliminar', 'App\Http\Controllers\CategoriaController@destroy');


/*
* Articulo
*/
Route::get('/articulover', 'App\Http\Controllers\ArticuloController@index');
Route::post('/articulocrear', 'App\Http\Controllers\ArticuloController@store');
Route::put('/articulomodificar', 'App\Http\Controllers\ArticuloController@update');
Route::delete('/articuloeliminar', 'App\Http\Controllers\ArticuloController@destroy');
