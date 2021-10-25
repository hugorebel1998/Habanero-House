<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productoCount = Product::count();
        $categoriaCount = Category::count();
        $usuarioCount = User::count();
        return view('home', compact('productoCount', 'categoriaCount', 'usuarioCount'));

    }
}
