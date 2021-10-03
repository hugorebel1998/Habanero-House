<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::where('id', '!=', '1')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(UserRequest $request){

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->fecha_nacimiento = Carbon::parse($request->fecha_de_nacimiento)->age;
        $usuario->telefono = $request->teléfono;
        $usuario->email = $request->correo_electrónico;
        $usuario->password = bcrypt($request->contraseña);

    
        if($usuario->save()){
            alert()->success('Éxito','Nuevo usuario creado.');
            return redirect()->to(route('usuarios.index'));
            
        }else{
            alert()->error('Oops','Hubo algún problema.');
            return redirect()->to(route('usuarios.create'));
        }
    }

    public function edit($id){

        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(){

    }
}


