<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\GaleryProduct;
use App\User;
use Illuminate\Support\Str;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\ProductInventary;

class ProductController extends Controller
{
    public function index()
    {

        $productos  = Product::all();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('admin.productos.create', compact('categorias'));
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

                alert()->success('Éxito nuevo platillo creado', 'Se registro un nuevo platillo.');
                return redirect()->to(route('admin.productos.index'));
            } else {
                alert()->error('Error', 'Ops no se pudo crear este platillo');
                return redirect()->back();
            }
        } else {
            alert()->error('Error', 'Ops no se pudo crear este platillo');
            return redirect()->to(route('admin.productos.create'));
        }
    }

    public function show($id)
    {
        $producto = Product::findOrFail($id);
        $categoria = Category::findOrFail($producto->category_id);
        return view('admin.productos.show', compact('producto', 'categoria'));
    }

    public function edit($id)
    {
        $categorias = Category::all();
        $producto = Product::findOrFail($id);
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {

        // $id = $request->user_id;
        $producto = Product::findOrFail($id);
        $request->validate([
            'nombre'               => 'required|max:30|unique:products,nombre,' . $producto->id,
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
                return redirect()->to(route('admin.productos.edit', $producto->id));
            } else {
                alert()->error('Error al actualizar', 'Ops no se pudo actualizar producto.');
                return redirect()->back();
            }
        } else {
            alert()->error('Error al actualizar', 'Ops no se pudo actualizar producto.');
            return redirect()->to(route('admin.productos.edit', $producto->id));
        }
    }
    public function delete($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        // alert()->success('Éxito al borrar ', 'Se ha borrado el producto.');
        return back();
    }

    public function indexDelete()
    {

        $productos = Product::onlyTrashed()->get();
        return view('admin.productos.indexdelete', compact('productos'));
    }

    public function productoRestore($id)
    {

        $producto = Product::find($id);
        Product::onlyTrashed()->findOrFail($id)->restore();
        // alert()->success('Éxito producto restablecido', 'Se ha restablecido el usuario.');
        return redirect()->to(route('admin.productos.index'));
    }

    public function productoCategoria(Request $request, $id)
    {
        $productoListas = Product::where('category_id', $id)->get();

        // dd($productoListas);
        return view('admin.productos.productcategory', compact('productoListas'));
    }

    public function productoInventario($id)
    {
        $productoInven = Product::findOrFail($id);
        $inventarios    =  ProductInventary::all();
        return view('admin.productos.productinventary', compact('productoInven', 'inventarios'));
    }

    public function storeProductInventary(Request $request, $id)
    {
        
        $productInventary = new ProductInventary();

        $request->validate([
            'nombre'               => 'required|max:30',
            'cantidad'             => 'min:1|required',
            'precio'               => 'required',
            'limitado'             => 'required',
            'minimo'               => 'required',
        ]);

        $productInventary-> product_id = $id;
        $productInventary->nombre = $request->nombre;
        $productInventary->cantidad_inventario = $request->cantidad;
        $productInventary->precio = $request->precio;
        $productInventary->limitado_inventario = $request->limitado;
        $productInventary->inventario_minimo = $request->minimo;
        // $productInventary->save();

        // dd($productInventary);   
        if ($productInventary->save()) {
            $productInventary->nombre = $request->nombre;
            $productInventary->cantidad_inventario = $request->cantidad;
            $productInventary->precio = $request->precio;
            $productInventary->limitado_inventario = $request->limitado;
            $productInventary->inventario_minimo = $request->minimo;
            $productInventary-> product_id = $id;

            if ($productInventary->save()) {

                alert()->success('Guardado con éxito');
                return redirect()->back();
            } else {
                alert()->error('Error', 'Ops no se pudo crear el inventario');
                return redirect()->back();
            }
        } else {
            alert()->error('Error', 'Ops no se pudo crear el inventario');
            return redirect()->to(route('admin.productos.inventario'));
        }
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
