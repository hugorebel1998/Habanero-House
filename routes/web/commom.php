<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ContentController@getHome')->name('home');