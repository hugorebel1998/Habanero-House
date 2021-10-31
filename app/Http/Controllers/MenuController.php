<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrar()
    {
        $productos = Product::all();
        return view('menu.mostrar', compact('productos'));

    }
}
