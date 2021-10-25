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
Route::get('/usuarios/index', 'UserController@index')->name('admin.usuarios.index')->middleware('auth');
Route::get('/usuarios/create', 'UserController@create')->name('admin.usuarios.create')->middleware('auth');
Route::post('/usuarios/store', 'UserController@store')->name('admin.usuarios.store')->middleware('auth');
Route::get('/usuarios/edit/{usuario}', 'UserController@edit')->name('admin.usuarios.edit')->middleware('auth');
Route::get('/usuarios/show/{usuario}', 'UserController@show')->name('admin.usuarios.show')->middleware('auth');
Route::put('/usuarios/update/{usuario}', 'UserController@update')->name('admin.usuarios.update')->middleware('auth');
Route::delete('/usuarios/delete/{usuario}', 'UserController@delete')->name('admin.usuarios.delete')->middleware('auth');
Route::get('/usuarios/contraseña/{usuario}', 'UserController@contraseña')->name('admin.usuarios.contraseña')->middleware('auth');
Route::post('/usuarios/updatecontraseña', 'UserController@updateContraseña')->name('admin.usuarios.updatecontraseña')->middleware('auth');
Route::get('/usuarios/usuarioeliminado', 'UserController@indexDelete')->name('admin.usuarios.indexdelete')->middleware('auth');
Route::get('/usuarios/usuariorestore/{usuario}', 'UserController@usuarioRestore')->name('admin.usuarios.usuariorestore')->middleware('auth');


// Productos
Route::get('/productos/index', 'ProductController@index')->name('productos.index')->middleware('auth');
Route::get('/productos/create', 'ProductController@create')->name('productos.create')->middleware('auth');
Route::post('/productos/store', 'ProductController@store')->name('productos.store')->middleware('auth');
Route::get('/productos/show/{producto}', 'ProductController@show')->name('productos.show')->middleware('auth');
Route::get('/productos/edit/{producto}', 'ProductController@edit')->name('productos.edit')->middleware('auth');
Route::put('/productos/update/{producto}', 'ProductController@update')->name('productos.update')->middleware('auth');
Route::delete('/productos/delete/{producto}', 'ProductController@delete')->name('productos.delete')->middleware('auth');
Route::get('/productos/productoeliminado', 'ProductController@indexDelete')->name('productos.indexDelete')->middleware('auth');
Route::get('/productos/productorestore/{producto}', 'ProductController@productoRestore')->name('productos.productorestore')->middleware('auth');

//Galeria Productos
// Route::post('productosgaleria/shore/{productogaleria}', 'ProductController@productGalery')->name('productosgaleria.store')->middleware('auth');


// Categorias
Route::get('/categorias/index', 'CategoryController@index')->name('categorias.index')->middleware('auth');
Route::get('/categorias/create', 'CategoryController@create')->name('categorias.create')->middleware('auth');
Route::post('/categorias/store', 'CategoryController@store')->name('categorias.store')->middleware('auth');
Route::get('/categorias/edit/{categoria}', 'CategoryController@edit')->name('categorias.edit')->middleware('auth');
Route::put('/categorias/update/{categoria}', 'CategoryController@update')->name('categorias.update')->middleware('auth');
Route::delete('/categorias/delete/{categoria}', 'CategoryController@delete')->name('categorias.delete')->middleware('auth');
Route::get('/categorias/indexdelete', 'CategoryController@indexDelete')->name('categorias.indexdelete')->middleware('auth');
Route::get('/categorias/categoriarestore/{categoria}', 'CategoryController@categoriaRestore')->name('categorias.categoriarestore')->middleware('auth');

});


