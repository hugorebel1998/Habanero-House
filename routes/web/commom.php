<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ContentController@getHome')->name('home');
Route::get('/usuario/edit/perfil/{id}', 'UserEditController@editarPerfil')->name('usuario.edit.perfil');
Route::put('/update/perfile/{id}', 'UserEditController@updatePerfile')->name('usuario.update.perfil');
Route::get('/usuario/contraseña/perfil/{id}', 'UserEditController@contraseñaPerfil')->name('usuario.contraseña.perfile');
Route::post('/update/contraseña/perfil', 'UserEditController@contraseñaUpdatePerfil')->name('usuario.contraseña.update');

//Route Sobre nosotros
Route::get('/sobre-nosotros', 'AboutController@mostrar')->name('usuario.about.nosotros');

//Route Menu de productos
Route::get('/menu', 'MenuController@mostrar')->name('usuario.mostrar.menu');
Route::get('/menu/ver-platillo/{platillo}', 'MenuController@show')->name('usuario.mostrar.show');

//Route Coctact
Route::get('/contacto', 'ContactController@mostrar')->name('usuario.mostrar.contacto');
Route::post('/contacto/mensaje/store', 'ContactController@store')->name('usuario.contacto.sotre');




