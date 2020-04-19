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

Route::resource('/categorias','ControllerCategories');

Route::get('/gato', function () {
    return view('elgato');
});

Route::get('/practica6', function () {
    return view('practica6');
});

Route::post('altausuario','UsuariosController@guardar')->name('altausuario');