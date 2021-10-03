<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::where('id', '!=', '1')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UserRequest $request)
    {

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        // $usuario->fecha_nacimiento = Carbon::parse($request->fecha_de_nacimiento)->age;
        $usuario->fecha_nacimiento = $request->fecha_de_nacimiento;
        $usuario->telefono = $request->teléfono;
        $usuario->email = $request->correo_electrónico;
        $usuario->password = bcrypt($request->contraseña);


        if ($usuario->save()) {
            alert()->success('Éxito', 'Nuevo usuario creado.');
            return redirect()->to(route('usuarios.index'));
        } else {
            alert()->error('Oops', 'Error tuvimos un problema.');
            return redirect()->to(route('usuarios.create'));
        }
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));

    }

    public function edit($id)
    {

        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {

        $usuario = User::findOrFail($id);
        $request->validate([
            'nombre'               => 'required|min:3|max:15',
            'apellido_paterno'     => 'required|max:15',
            'apellido_materno'     => 'required|max:15',
            'fecha_de_nacimiento'  => 'required',
            'teléfono'             => 'required|numeric|min:10',
            'correo_electrónico'   => 'required|email|unique:users,email,' . $usuario->id,
        ]);


        $usuario->name = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->fecha_nacimiento = $request->fecha_de_nacimiento;
        $usuario->telefono = $request->teléfono;
        $usuario->email = $request->correo_electrónico;

        // dd($usuario);

        if($usuario->save()){
            alert()->success('Éxito','Usuario actualizado con éxito.');
            return redirect()->to(route('usuarios.index'));

        }else{
            alert()->error('Oops','Error tuvimos un problema.');
            return redirect()->to(route('usuarios.create'));
        }

    }

    public function delete($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        alert()->success('Éxito','Usuario eliminado.');
        return back();
        

    }
}
