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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('noticias', 'NoticiaController');

Route::get('/perfil', 'PerfilController@index')->name('perfil.index');

Route::get('/perfil/noticias', 'PerfilController@noticias')->name('perfil.noticias');

Route::get('/foro', 'ForoController@index')->name('foro.index');

Route::get('/foro/post/{id}', 'ForoController@show')->name('foro.post');