<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', 'AdminHomeController@index')->name('admin.home');


Route::group(['middleware' => ['isAdmin','role:super-admin|admin|gerente']], function () {
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
    Route::get('/productos/index', 'ProductController@index')->name('admin.productos.index')->middleware('auth');
    Route::get('/productos/create', 'ProductController@create')->name('admin.productos.create')->middleware('auth');
    Route::post('/productos/store', 'ProductController@store')->name('admin.productos.store')->middleware('auth');
    Route::get('/productos/show/{producto}', 'ProductController@show')->name('admin.productos.show')->middleware('auth');
    Route::get('/productos/edit/{producto}', 'ProductController@edit')->name('admin.productos.edit')->middleware('auth');
    Route::put('/productos/update/{producto}', 'ProductController@update')->name('admin.productos.update')->middleware('auth');
    Route::delete('/productos/delete/{producto}', 'ProductController@delete')->name('admin.productos.delete')->middleware('auth');
    Route::get('/productos/productoeliminado', 'ProductController@indexDelete')->name('admin.productos.indexDelete')->middleware('auth');
    Route::get('/productos/productorestore/{producto}', 'ProductController@productoRestore')->name('admin.productos.productorestore')->middleware('auth');
    Route::get('/productos/productocategoria/{id}', 'ProductController@productoCategoria')->name('admin.productos.categoria')->middleware('auth');
    Route::get('/productos/producto-inventario/{producto}', 'ProductController@productoInventario')->name('admin.productos.inventario')->middleware('auth');
    Route::post('/productos/producto-inventario-store/{producto}','ProductController@storeProductInventary')->name('admin.productos.inventario.store')->middleware('auth');
    Route::get('/productos/producto-inventario-edit/{producto}', 'ProductController@editProductInventary')->name('admin.productos.inventario.edit')->middleware('auth');
    Route::put('/productos/producto-inventario-update/{producto}', 'ProductController@updateProductInventary')->name('admin.productos.inventario.update')->middleware('auth');
    Route::delete('/productos/producto-inventario-delete/{producto}', 'ProductController@deleteProductInventary')->name('admin.productos.inventario.delete')->middleware('auth');
    Route::get('/productos/producto-inventario-eliminados', 'ProductController@indexDeleteInventario')->name('admin.productos.inventario.indexDelete')->middleware('auth');
    Route::get('/productos/producto-inventario-eliminado-restore/{producto}', 'ProductController@inventarioRestore')->name('admin.productos.inventario.inventariorestore')->middleware('auth');
    Route::get('/productos/producto-variante/{variante}', 'ProductController@productVariant')->name('admin.producto.variante')->middleware('auth');
    Route::post('/productos/producto-variante-store/{variante}', 'ProductController@productVariantstore')->name('admin.producto.variante.store')->middleware('auth');
    Route::delete('/productos/producto-variante-delete/{variante}', 'ProductController@deleteProductVariant')->name('admin.productos.variante.delete');
    
    //Galeria Productos
    // Route::post('productosgaleria/shore/{productogaleria}', 'ProductController@productGalery')->name('productosgaleria.store')->middleware('auth');


    // Categorias
    Route::get('/categorias/index', 'CategoryController@index')->name('admin.categorias.index')->middleware('auth');
    Route::get('/categorias/create', 'CategoryController@create')->name('admin.categorias.create')->middleware('auth');
    Route::post('/categorias/store', 'CategoryController@store')->name('admin.categorias.store')->middleware('auth');
    Route::get('/categorias/edit/{categoria}', 'CategoryController@edit')->name('admin.categorias.edit')->middleware('auth');
    Route::put('/categorias/update/{categoria}', 'CategoryController@update')->name('admin.categorias.update')->middleware('auth');
    Route::delete('/categorias/delete/{categoria}', 'CategoryController@delete')->name('admin.categorias.delete')->middleware('auth');
    Route::get('/categorias/indexdelete', 'CategoryController@indexDelete')->name('admin.categorias.indexdelete')->middleware('auth');
    Route::get('/categorias/categoriarestore/{categoria}', 'CategoryController@categoriaRestore')->name('admin.categorias.categoriarestore')->middleware('auth');

    //Mensajes
    Route::get('/contacto/index', 'ContactController@index')->name('admin.contacto.index')->middleware('auth');
    Route::get('/contacto/mensaje/{mensaje}', 'ContactController@ContactanosMensaje')->name('admin.contacto.mensaje')->middleware('auth');

    //Settings
    // Route::get('/restaurante/index', 'RestaurantController@index')->name('admin.ajustes.index')->middleware('auth');
    // Route::get('/restaurante/edit/{restaurat}', 'RestaurantController@edit')->name('admin.ajustes.edit')->middleware('auth');
    // Route::put('/restaurante/update/', 'RestaurantController@update')->name('admin.ajustes.update')->middleware('auth');

});
