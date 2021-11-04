<?php

namespace App\Http\Controllers;

use App\Category;
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
        // $productosAntojitos = Product::select('nombre', 'precio', 'imagen_producto', 'descripcion')
        //                            ->where('category_id',1)->get();

        $productosSopas = Product::select('id','nombre', 'precio', 'imagen_producto', 'descripcion')
                                   ->where('category_id',2)
                                   ->where('status', 1)->get();

        $productosEnsaladas = Product::select('id','nombre', 'precio', 'imagen_producto', 'descripcion')
                                   ->where('category_id',3)
                                   ->where('status', 1)->get();


        $productosAntojitos = Product::select('id','nombre', 'precio', 'imagen_producto', 'descripcion')
                                   ->where('category_id',4)
                                   ->where('status', 1)->get();

        

        return view('menu.mostrar', compact('productosAntojitos', 'productosSopas', 'productosEnsaladas'));

    }
    public function show($id)
    {

        $producto = Product::findOrFail($id);
        $categoria = Category::findOrFail($producto->category_id);
        return view('menu.show', compact('producto', 'categoria'));


    }
}