<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        $productos  = Product::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductRequest $request)

    {
        $producto = new Product();
        $producto->nombre = $request->nombre;
        $producto->category_id = $request->input('categoria') ?: null;
        $producto->precio = $request->precio;
        $producto->descuento = $request->descuento;
        $producto->indescuento = $request->en_descuento;
        $producto->imagen_producto = $request->file('imagen');
        $producto->descripcion = $request->descripcion;
        $producto->user_id = auth()->user()->id;


        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/products');
            $archivo->move($ruta, $nombre_imagen);
            $producto['imagen_producto'] = $nombre_imagen;
        }
        // dd($producto);

        if ($producto->save()) {
            $producto->nombre = $request->nombre;
            $producto->category_id = $request->input('categoria') ?: null;
            $producto->precio = $request->precio;
            $producto->descuento = $request->descuento;
            $producto->indescuento = $request->en_descuento;
            $producto->imagen_producto = $request->file('imagen');
            $producto->descripcion = $request->descripcion;
            $producto->user_id = auth()->user()->id;

            if ($producto->save()) {

                alert()->success('Éxito', 'Nuevo producto creado.');
                return redirect()->to(route('productos.index'));
            } else {
                alert()->error('Error', 'Ops no se pudo crear producto');
                return redirect()->back();
            }
        }else{
            alert()->error('Error al actualizar reporte');
            return redirect()->to(route('productos.create'));
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
