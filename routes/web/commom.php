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
Route::post('/platillo/inventario/{inventario}', 'ApiJsController@productInventory');


//Route Coctact
Route::get('/contacto', 'ContactController@mostrar')->name('usuario.mostrar.contacto');
Route::post('/contacto/mensaje/store', 'ContactController@store')->name('usuario.contacto.sotre');

//Route Carrito de compras
Route::get('/cart', 'CartController@getCart')->name('usuario.cart');
Route::post('/cart/add/{product}','CartController@postCart')->name('usuario.cart.store');
Route::put('/cart/update/{product}','CartController@updateCart')->name('usuario.cart.update');Route::put('/cart/update/{product}','CartController@updateCart')->name('usuario.cart.update');
Route::delete('/cart/delete/{product}','CartController@deleteCart')->name('usuario.cart.delete');
Route::get('cart/mostrar/{product}', 'CartController@mostrar')->name('usuario.cart.mostrar');


//Route Address
Route::get('/usuario/address', 'UserEditController@address')->name('usuario.address');
Route::post('/usuario/address', 'UserEditController@storeAddress')->name('usuario.address.store');
Route::post('/usuario/address/cities/{cities}', 'ApiJsController@postCities');
Route::get('/usuario/address/default/{default}', 'UserEditController@getAccounAddressDefault')->name('usuario.address.default');
Route::delete('/usuario/address/delete/{cities}', 'UserEditController@deleteAddrees')->name('usuario.addreess.delet');

