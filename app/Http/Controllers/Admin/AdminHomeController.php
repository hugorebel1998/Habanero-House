<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $productoCount = Product::count();
        $categoriaCount = Category::count();
        $usuarioCount = User::count();
        return view('adminhome', compact('productoCount', 'categoriaCount', 'usuarioCount'));

    }

}
