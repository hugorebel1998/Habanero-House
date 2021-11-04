<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Functions;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function index(){
        $categorias = Category::all();
        return view('admin.categorias.index', compact('categorias'));

    }
    function create(){
        return view('admin.categorias.create');
    }

    function store(Request $request){
        $categoria = new Category();

        $request->validate([

            'nombre'      => 'required|unique:categories,nombre',
            'icono'       => 'required',
            'descripcion' => "required"
        ]);

        $categoria->nombre      = $request->nombre;
        $categoria->slug        = Str::slug($request->nombre);
        $categoria->icono       = $request->icono;
        $categoria->descripcion = $request->descripcion;

        // dd($categoria);

        if($categoria->save()){
            alert()->success('Éxito nueva categoria creada', 'Se registro una nueva categoria '. $categoria->nombre);
            return redirect()->to(route('admin.categorias.index'));

        }else{
            alert()->error('Ops algo salio mal');
            return redirect()->to(route('admin.categorias.index'));
        }

    }
    public function edit($id){
        $categoria = Category::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id){
        
        $categoria = Category::findOrFail($id);
        $request->validate([

            'nombre'      => 'required|unique:categories,nombre,'. $categoria->id,
            'icono'       => 'required',
            'descripcion' => "required"
        ]);

        $categoria->nombre      = $request->nombre;
        $categoria->slug        = Str::slug($request->nombre);
        $categoria->icono       = $request->icono;
        $categoria->descripcion = $request->descripcion;
        
        if($categoria->save()){
            alert()->success('Éxito categoria actualizada', 'La categoria se actualizo con el nombre '. $categoria->nombre);
            return redirect()->to(route('admin.categorias.index'));

        }else{
            alert()->error('Ops algo salio mal');
            return redirect()->to(route('admin.categorias.edit'));
        }

    }

    public function delete($id){
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        // alert()->success('Éxito al borrar ', 'Se ha borrado la categoria.');
        return back();
    }

    public function indexDelete(){
        $categorias = Category::onlyTrashed()->get();
        return view('admin.categorias.indexdelete', compact('categorias'));
    }

    public function categoriaRestore($id)
    {

        $categoria = Category::find($id);
        Category::onlyTrashed()->findOrFail($id)->restore();
        // alert()->success('Éxito categoria restablecida', 'Se ha restablecido la categoria');
        return redirect()->to(route('admin.categorias.index'));
    }
}
