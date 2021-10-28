<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ContentController@getHome')->name('home');
Route::get('/usuario/edit/perfil/{id}', 'UserEditController@editarPerfil')->name('usuario.edit.perfil');
Route::put('/update/perfile/{id}', 'UserEditController@updatePerfile')->name('usuario.update.perfil');