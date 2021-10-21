<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Functions;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    function index(){
        $categorias = Category::all();
        return view('categorias.index', compact('categorias'));

    }
    function create(){
        return view('categorias.create');
    }

    function store(Request $request){
        $categoria = new Category();

        $request->validate([

            'nombre'      => 'required|unique:categories,nombre',
            'descripcion' => "required"
        ]);

        $categoria->nombre      = $request->nombre;
        $categoria->slug        = Str::slug($request->nombre);
        $categoria->descripcion = $request->descripcion;

        // dd($categoria);

        if($categoria->save()){
            alert()->success('Éxito nueva categoria creada', 'Se registro una nueva categoria '. $categoria->nombre);
            return redirect()->to(route('categorias.index'));

        }else{
            alert()->error('Ops algo salio mal');
            return redirect()->to(route('categorias.index'));
        }

    }
    public function edit($id){
        $categoria = Category::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id){
        
        $categoria = Category::findOrFail($id);
        $request->validate([

            'nombre'      => 'required|unique:categories,nombre,'. $categoria->id,
            'descripcion' => "required"
        ]);

        $categoria->nombre      = $request->nombre;
        $categoria->slug        = Str::slug($request->nombre);
        $categoria->descripcion = $request->descripcion;
        
        if($categoria->save()){
            alert()->success('Éxito categoria actualizada', 'La categoria se actualizo con el nombre '. $categoria->nombre);
            return redirect()->to(route('categorias.index'));

        }else{
            alert()->error('Ops algo salio mal');
            return redirect()->to(route('categorias.edit'));
        }

    }

    public function delete($id){
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        alert()->success('Éxito al borrar ', 'Se ha borrado la categoria.');
        return back();
    }
}
