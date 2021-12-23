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
        //Platillos entradas
        $productosEntradas = Product::select('id', 'nombre', 'precio', 'imagen_producto', 'descripcion')
            ->where('category_id', 1)
            ->where('status', 1)->get();

        //Platillos sopas
        $productosSopas = Product::select('id', 'nombre', 'precio', 'imagen_producto', 'descripcion')
            ->where('category_id', 2)
            ->where('status', 1)->get();
        
            //Platillos ensaladas
        $productosEnsaladas = Product::select('id', 'nombre', 'precio', 'imagen_producto', 'descripcion')
            ->where('category_id', 3)
            ->where('status', 1)->get();

        //Platillos antojitosregionales
        $productosAntojitos = Product::select('id', 'nombre', 'precio', 'imagen_producto', 'descripcion')
            ->where('category_id', 4)
            ->where('status', 1)->get();
        
        //Platillos fusion europea
        $productosEuropeas = Product::select('id', 'nombre', 'precio', 'imagen_producto', 'descripcion')
            ->where('category_id', 5)
            ->where('status', 1)->get();



        return view('menu.mostrar', compact('productosEntradas','productosAntojitos', 'productosSopas', 'productosEnsaladas', 'productosEuropeas'));
    }

    public function show($id)
    {
        $producto = Product::findOrFail($id);
        $categoria = Category::findOrFail($producto->category_id);
        return view('menu.show', compact('producto', 'categoria'));
    }
}
