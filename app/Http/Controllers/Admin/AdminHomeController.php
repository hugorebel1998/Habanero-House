<?php

namespace App\Http\Controllers\Admin;


use App\Product;
use App\Category;
use App\Coverage;
use App\User;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{

        public function __construct()
        {
                $this->middleware('auth');
                $this->middleware('isAdmin');
        }

        public function index()
        {
                
                $productoCount = Product::count();
                $categoriaCount = Category::count();
                $usuarioCount = User::count();
                $coverageCount = Coverage::where('tipo_covertura', '0')->count();
                $ordenCount = Order::where('status', '!=', '0')->count();
                return view('adminhome', compact('productoCount', 'categoriaCount', 'usuarioCount','coverageCount','ordenCount'));
        }
}
