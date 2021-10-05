<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect(route('home'));
    } else {
        return view('auth.login');
    }
});

Auth::routes();
Auth::routes(['register' => false]);
Route::match(['get','post'], 'register' , function(){
return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin|admin|gerente']], function(){
//usuarios
Route::get('/usuarios/index', 'UserController@index')->name('usuarios.index')->middleware('auth');
Route::get('/usuarios/create', 'UserController@create')->name('usuarios.create')->middleware('auth');
Route::post('/usuarios/store', 'UserController@store')->name('usuarios.store')->middleware('auth');
Route::get('/usuarios/edit/{usuario}', 'UserController@edit')->name('usuarios.edit')->middleware('auth');
Route::get('/usuarios/show/{usuario}', 'UserController@show')->name('usuarios.show')->middleware('auth');
Route::put('/usuarios/update/{usuario}', 'UserController@update')->name('usuarios.update')->middleware('auth');
Route::get('/usuarios/delete/{usuario}', 'UserController@delete')->name('usuarios.delete')->middleware('auth');
Route::get('/usuarios/contraseña/{usuario}', 'UserController@contraseña')->name('usuarios.contraseña')->middleware('auth');
Route::post('/usuarios/updatecontraseña', 'UserController@updateContraseña')->name('usuarios.updatecontraseña')->middleware('auth');

});




