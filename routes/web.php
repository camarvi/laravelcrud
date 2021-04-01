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


//Listado de usuarios
Route::get('/', 'UserController@list');


//Formulario crear usuario
Route::get('/form', 'UserController@userform');

//Ruta para guardar usuarios
// ->name('save') es para poner un nombre a la ruta
Route::post('/save', 'UserController@save')->name('save');

//Borrar un usuario
Route::delete('/delete/{id}', 'UserController@delete')->name('delete');

//Formulario Para editar
Route::get('/editform/{id}', 'UserController@editform')->name('editform');

//Edicion de usuarios
Route::patch('/edit/{id}', 'UserController@edit')->name('edit');


