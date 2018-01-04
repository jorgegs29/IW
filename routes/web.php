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

Route::get('/perfil/mensajes', 'PerfilController@mensajes')->name('perfil.mensajes');

Route::get('/perfil/juegos', 'PerfilController@juegos')->name('perfil.juegos');

Route::get('/foro', 'ForoController@index')->name('foro.index');

Route::get('/foro/post/{id}', 'ForoController@show')->name('foro.post');

Route::resource('posts', 'PostController');

Route::resource('mensajes', 'MensajeController');

Route::resource('juegos', 'JuegoController');

Route::post('/juegos/search', 'JuegoController@search')->name('juegos.search');