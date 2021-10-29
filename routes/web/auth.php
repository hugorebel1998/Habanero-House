<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    if (Auth::check() && auth()->user()->permiso == 1) {
        return redirect()->to(route('admin.home'));
    }elseif(Auth::check() && auth()->user()->permiso == 2){
        return redirect()->to(route('admin.home'));
    }elseif(Auth::check() && auth()->user()->permiso == 3){
        return redirect()->to(route('admin.home'));
    }elseif(Auth::check() && auth()->user()->permiso == null){
        return redirect()->to(route('home'));
    }else {
        return view('auth.login');
    }
    // if (Auth::check()) {
    //     return redirect()->to(route('admin.home'));
    // } else {
    //     return view('auth.login');
    // }
});

Auth::routes();
// Auth::routes(['register' => false]);
// Route::match(['get', 'post'], 'register', function () {
//     return redirect('/');
// });
