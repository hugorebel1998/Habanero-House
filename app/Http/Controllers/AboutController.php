<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
        
    // }

    public function mostrar()
    {
     return view('nosotros.mostrar');
    }
}
