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
        // $producto->imagen_producto = $request->file('imagen');
        $producto->descripcion = $request->descripcion;
        $producto->user_id = auth()->user()->id;

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $url = 'img/products/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuceess = $request->file('imagen')->move($url, $filename);
            $producto->imagen_producto = $url . $filename;

        }

        // if ($archivo = $request->file('imagen')) {
        //     $nombre_imagen = $archivo->getClientOriginalName();
        //     $ruta = public_path('img/products');
        //     $archivo->move($ruta, $nombre_imagen);
        //     $producto['imagen_producto'] = $nombre_imagen;
        // }

        

        if ($producto->save()) {
            $producto->nombre = $request->nombre;
            $producto->category_id = $request->input('categoria') ?: null;
            $producto->precio = $request->precio;
            $producto->descuento = $request->descuento;
            $producto->indescuento = $request->en_descuento;
            // $producto->imagen_producto = $request->file('imagen');
            $producto->descripcion = $request->descripcion;
            $producto->user_id = auth()->user()->id;

            if ($producto->save()) {

                alert()->success('Éxito', 'Nuevo producto creado.'.  $producto->nombre );
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
        $categoria = Category::select('id', 'nombre')->get();
        $producto = Product::findOrFail($id);
        return view('productos.show', compact('producto', 'categoria'));

    }

    public function edit($id)
    {
        $categorias = Category::all();
        $producto = Product::findOrFail($id);
        return view('productos.edit', compact('producto', 'categorias'));

    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
