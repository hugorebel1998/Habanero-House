<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;


use App\Product;
use App\GaleryProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $producto->status = '0';
        $producto->nombre = $request->nombre;
        $producto->slug = Str::slug($request->nombre);
        $producto->category_id = $request->input('categoria') ?: null;
        $producto->precio = $request->precio;
        $producto->descuento = $request->descuento;
        $producto->indescuento = $request->en_descuento;
        $producto->cantidad = $request->cantidad;
        $producto->codigo_producto = $request->código_producto;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = auth()->user()->id;
        

        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/products/');
            $archivo->move($ruta, $nombre_imagen);
            $producto['imagen_producto'] = $nombre_imagen;
        }

        // dd($producto);


        if ($producto->save()) {
            $producto->status = '1';
            $producto->nombre = $request->nombre;
            $producto->slug = Str::slug($request->nombre);
            $producto->category_id = $request->input('categoria') ?: null;
            $producto->precio = $request->precio;
            $producto->descuento = $request->descuento;
            $producto->indescuento = $request->en_descuento;
            $producto->cantidad = $request->cantidad;
            $producto->codigo_producto = $request->código_producto;
            $producto->descripcion = $request->descripcion;
            $producto->user_id = auth()->user()->id;

            if ($producto->save()) {

                alert()->success('Éxito nuevo pruducto creado', 'Se registro un nuevo producto.' .  $producto->nombre);
                return redirect()->to(route('productos.index'));
            } else {
                alert()->error('Error', 'Ops no se pudo crear producto');
                return redirect()->back();
            }
        } else {
            alert()->error('Error al crear producto');
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

    public function update(Request $request, $id)
    {

        // $id = $request->user_id;
        $producto = Product::findOrFail($id);
        $request->validate([
            'nombre'               => 'required|max:30|unique:products,nombre,'. $producto->id,
            'precio'               => 'required',
            'descuento'            => 'required',
            'descripcion'          => 'required',
            'en_descuento'         => 'required|in:0,1',
            'cantidad'              => 'min:1|required'
        ]);

        $producto->status = $request->status;
        $producto->nombre = $request->nombre;
        $producto->slug = Str::slug($request->nombre);
        $producto->category_id = $request->input('categoria') ?: null;
        $producto->precio = $request->precio;
        $producto->descuento = $request->descuento;
        $producto->indescuento = $request->en_descuento;
        $producto->cantidad = $request->cantidad;
        $producto->codigo_producto = $request->código_producto;
        $producto->descripcion = $request->descripcion;
        $producto->editor_id = auth()->user()->id;

       
        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/products/');
            $archivo->move($ruta, $nombre_imagen);
            $producto['imagen_producto'] = $nombre_imagen;
        }

        // dd($producto);
        if ($producto->save()) {
            $producto->status = $request->status;
            $producto->nombre = $request->nombre;
            $producto->category_id = $request->input('categoria') ?: null;
            $producto->precio = $request->precio;
            $producto->descuento = $request->descuento;
            $producto->indescuento = $request->en_descuento;
            $producto->cantidad = $request->cantidad;
            $producto->codigo_producto = $request->código_producto;
            $producto->descripcion = $request->descripcion;
            $producto->editor_id = auth()->user()->id;

            if ($producto->save()) {

                alert()->success('Éxito al actualizar', 'Producto actualizado con éxito.' .  $producto->nombre);
                return redirect()->to(route('productos.edit', $producto->id));
            } else {
                alert()->error('Error al actualizar', 'Ops no se pudo actualizar producto.');
                return redirect()->back();
            }
        } else {
            alert()->error('Error al actualizar', 'Ops no se pudo actualizar producto.');
            return redirect()->to(route('productos.edit', $producto->id));
        }
    }
    public function delete($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        // alert()->success('Éxito al borrar ', 'Se ha borrado el producto.');
        return back();
    }

    public function indexDelete(){

        $productos = Product::onlyTrashed()->get();
        return view('productos.indexdelete', compact('productos'));
    }

    public function productoRestore($id)
    {

        $producto = Product::find($id);
        Product::onlyTrashed()->findOrFail($id)->restore();
        // alert()->success('Éxito producto restablecido', 'Se ha restablecido el usuario.');
        return redirect()->to(route('productos.index'));
    }



    // public function productGalery(Request $request, $id)
    // {


    //     $producto = new GaleryProduct();
    //     // $request->validate([
    //     //     'imagen_producto' =
    //     // ]);

    //     $producto->product_id = $id;
    //     // $producto->imagen_product_galery = $request->imagen_producto;


    //     if ($request->hasFile('imagen_producto')) {
    //         $file = $request->file('imagen_producto');
    //         $url = 'img/products/';
    //         $filename = time() . '-' . $file->getClientOriginalName();
    //         $uploadSuceess = $request->file('imagen_producto')->move($url, $filename);
    //         $producto->imagen_product_galery = $url . $filename;
    //     }

    //     // dd($producto);

    //     if ($producto->save()) {

    //         alert()->success('Imagen guardado con éxito', 'se guardo una nueva imagen.');
    //         return redirect()->to(route('productos.edit', $producto->product_id));
    //     } else {
    //         alert()->error('Error al cargar imagen', 'Ops no se pudo cargar la imagen.');
    //         return redirect()->back();
    //     }
    // }
}
