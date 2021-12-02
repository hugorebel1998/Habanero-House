<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', 'AdminHomeController@index')->name('admin.home');


Route::group(['middleware' => ['isAdmin','role:super-admin|admin|gerente']], function () {
    //usuarios
    Route::get('/usuarios/index', 'UserController@index')->name('admin.usuarios.index');
    Route::get('/usuarios/create', 'UserController@create')->name('admin.usuarios.create');
    Route::post('/usuarios/store', 'UserController@store')->name('admin.usuarios.store');
    Route::get('/usuarios/edit/{usuario}', 'UserController@edit')->name('admin.usuarios.edit');
    Route::get('/usuarios/show/{usuario}', 'UserController@show')->name('admin.usuarios.show');
    Route::put('/usuarios/update/{usuario}', 'UserController@update')->name('admin.usuarios.update');
    Route::delete('/usuarios/delete/{usuario}', 'UserController@delete')->name('admin.usuarios.delete');
    Route::get('/usuarios/contraseña/{usuario}', 'UserController@contraseña')->name('admin.usuarios.contraseña');
    Route::post('/usuarios/updatecontraseña', 'UserController@updateContraseña')->name('admin.usuarios.updatecontraseña');
    Route::get('/usuarios/usuarioeliminado', 'UserController@indexDelete')->name('admin.usuarios.indexdelete');
    Route::get('/usuarios/usuariorestore/{usuario}', 'UserController@usuarioRestore')->name('admin.usuarios.usuariorestore');


    // Productos
    Route::get('/productos/index', 'ProductController@index')->name('admin.productos.index');
    Route::get('/productos/create', 'ProductController@create')->name('admin.productos.create');
    Route::post('/productos/store', 'ProductController@store')->name('admin.productos.store');
    Route::get('/productos/show/{producto}', 'ProductController@show')->name('admin.productos.show');
    Route::get('/productos/edit/{producto}', 'ProductController@edit')->name('admin.productos.edit');
    Route::put('/productos/update/{producto}', 'ProductController@update')->name('admin.productos.update');
    Route::delete('/productos/delete/{producto}', 'ProductController@delete')->name('admin.productos.delete');
    Route::get('/productos/productoeliminado', 'ProductController@indexDelete')->name('admin.productos.indexDelete');
    Route::get('/productos/productorestore/{producto}', 'ProductController@productoRestore')->name('admin.productos.productorestore');
    Route::get('/productos/productocategoria/{id}', 'ProductController@productoCategoria')->name('admin.productos.categoria');
    Route::get('/productos/producto-inventario/{producto}', 'ProductController@productoInventario')->name('admin.productos.inventario');
    Route::post('/productos/producto-inventario-store/{producto}','ProductController@storeProductInventary')->name('admin.productos.inventario.store');
    Route::get('/productos/producto-inventario-edit/{producto}', 'ProductController@editProductInventary')->name('admin.productos.inventario.edit');
    Route::put('/productos/producto-inventario-update/{producto}', 'ProductController@updateProductInventary')->name('admin.productos.inventario.update');
    Route::delete('/productos/producto-inventario-delete/{producto}', 'ProductController@deleteProductInventary')->name('admin.productos.inventario.delete');
    Route::get('/productos/producto-inventario-eliminados', 'ProductController@indexDeleteInventario')->name('admin.productos.inventario.indexDelete');
    Route::get('/productos/producto-inventario-eliminado-restore/{producto}', 'ProductController@inventarioRestore')->name('admin.productos.inventario.inventariorestore');
    Route::get('/productos/producto-variante/{variante}', 'ProductController@productVariant')->name('admin.producto.variante');
    Route::post('/productos/producto-variante-store/{variante}', 'ProductController@productVariantstore')->name('admin.producto.variante.store');
    Route::delete('/productos/producto-variante-delete/{variante}', 'ProductController@deleteProductVariant')->name('admin.productos.variante.delete');
    
    //Galeria Productos
    // Route::post('productosgaleria/shore/{productogaleria}', 'ProductController@productGalery')->name('productosgaleria.store')->middleware('auth');


    // Categorias
    Route::get('/categorias/index', 'CategoryController@index')->name('admin.categorias.index');
    Route::get('/categorias/create', 'CategoryController@create')->name('admin.categorias.create');
    Route::post('/categorias/store', 'CategoryController@store')->name('admin.categorias.store');
    Route::get('/categorias/edit/{categoria}', 'CategoryController@edit')->name('admin.categorias.edit');
    Route::put('/categorias/update/{categoria}', 'CategoryController@update')->name('admin.categorias.update');
    Route::delete('/categorias/delete/{categoria}', 'CategoryController@delete')->name('admin.categorias.delete');
    Route::get('/categorias/indexdelete', 'CategoryController@indexDelete')->name('admin.categorias.indexdelete');
    Route::get('/categorias/categoriarestore/{categoria}', 'CategoryController@categoriaRestore')->name('admin.categorias.categoriarestore');

    //Mensajes
    Route::get('/contacto/index', 'ContactController@index')->name('admin.contacto.index');;
    Route::get('/contacto/mensaje/{mensaje}', 'ContactController@ContactanosMensaje')->name('admin.contacto.mensaje');

    //Settings
    Route::get('/setting/index', 'RestaurantController@index')->name('admin.ajustes.index');
    Route::get('/setting/edit/{restaurat}', 'RestaurantController@edit')->name('admin.ajustes.edit');
    Route::put('/setting/update/', 'RestaurantController@update')->name('admin.ajustes.update');


    //Covertura de envios
    Route::get('/covertura/index', 'CoverturaController@index')->name('admin.covertura.index');
    Route::post('covertura/store', 'CoverturaController@store')->name('admin.covertura.store');
    Route::get('/covertura/edit/{coverage}', 'CoverturaController@edit')->name('admin.covertura.edit');
    Route::put('/covertura/update/{coverage}', 'CoverturaController@update')->name('admin.covertura.update');
    Route::delete('/covertura/delete/{coverage}', 'CoverturaController@delete')->name('admin.covertura.delete');
    Route::get('/covertura/index/delete', 'CoverturaController@indexDelete')->name('admin.covertura.index.delete');
    Route::get('/covertura/index/delete/restore/{coverage}', 'CoverturaController@coverturaRestore')->name('admin.covertura.index.restore');
    //Covertura de envios municipios o delegaciones
    Route::get('/coverturas/localidad/{localidad}', 'CoverturaController@localidad')->name('admin.covertura.localidad');
    Route::post('covertura/localidad/store', 'CoverturaController@localidadStore')->name('admin.covertura.localidad.store');
    Route::get('/coverturas/localidad/edit/{localidad}', 'CoverturaController@editLocalidad')->name('admin.covertura.localidad.edit');
    Route::put('/coverturas/localidad/update/{localidad}', 'CoverturaController@updateLocalidad')->name('admin.covertura.localidad.update');
    Route::delete('covertura/localidad/delete/{localidad}', 'CoverturaController@delateLocalidad')->name('admin.covertura.localidad.delete');
    Route::get('/covertura/localidad/index/delete', 'CoverturaController@indexLocalDelete')->name('admin.covertura.index.ylocal.delete');
    // Route::get('/covertura/index/delete/restore/{coverage}', 'CoverturaController@coverturaRestore')->name('admin.covertura.index.restore');

    
    



});
