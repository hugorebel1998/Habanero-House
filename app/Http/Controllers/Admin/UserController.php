<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserStatus;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ContraseñaRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
        $this->middleware(['permission:create usuario'], ['only' => 'create', 'store']);
        $this->middleware(['permission:read usuario'], ['only' => 'index']);
        $this->middleware(['permission:update usuario'], ['only' => 'edit', 'update']);
        $this->middleware(['permission:delete usuario'], ['only' => 'delete']);
    }



    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $user_status = UserStatus::pluck('id')->first();

        $usuario = new User();
        $usuario->name = ucwords($request->nombre);
        $usuario->apellido_paterno = ucwords($request->apellido_paterno);
        $usuario->apellido_materno = ucwords($request->apellido_materno);        
        $usuario->fecha_nacimiento = $request->fecha_de_nacimiento;
        $usuario->telefono = $request->teléfono;
        $usuario->email = $request->correo_electrónico;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->status_id = $user_status;
        $usuario->editor_id = auth()->user()->id;

        
        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/users/');
            $archivo->move($ruta, $nombre_imagen);
            $usuario['imagen_usuario'] = $nombre_imagen;
        }
        // dd($usuario);


        if ($usuario->save()) {
            $usuario->name = $request->nombre;
            $usuario->apellido_paterno = $request->apellido_paterno;
            $usuario->apellido_materno = $request->apellido_materno;
            $usuario->fecha_nacimiento = $request->fecha_de_nacimiento;
            $usuario->telefono = $request->teléfono;
            // $usuario->imagen_usuario = $request->file('imagen_');
            $usuario->email = $request->correo_electrónico;
            $usuario->password = bcrypt($request->contraseña);
            $usuario->editor_id = auth()->user()->id;

            if ($usuario->save()) {

                alert()->success('Éxito nuevo usuario','Se registro un nuevo usuario', $usuario->nombre);
                  return redirect()->to(route('admin.usuarios.index'));
            } else {
                alert()->error('Oops error', 'Al parecer tuvimos un error.');
                return redirect()->back();
            }
        } else {
            alert()->error('Oops error', 'Al parecer tuvimos un error.');
                return redirect()->to(route('admi.usuarios.create'));
        }

    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        $cumple = Carbon::parse($usuario->fecha_nacimiento)->format('d M');
        $nombre = "$usuario->name   $usuario->apellido_paterno";  
        
        return view('admin.usuarios.show', compact('usuario', 'cumple', 'nombre'));
    }

    public function edit($id)
    {

        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
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
        $usuario->editor_id = auth()->user()->id;

        // dd($usuario);

        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/users/');
            $archivo->move($ruta, $nombre_imagen);
            $usuario['imagen_usuario'] = $nombre_imagen;
        }

        if ($usuario->save()) {
            alert()->success('Éxito usuario actualizado', 'Se actualizo al usuario.', $usuario->nombre);
            return redirect()->to(route('admin.usuarios.index'));
        } else {
            alert()->error('Oops error', 'Al parecer tuvimos un error.');
            return redirect()->to(route('admin.usuarios.create'));
        }
    }

    public function delete($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        // alert()->success('Éxito', 'Usuario eliminado.');
        return back();
    }   

    public function contraseña($id)
    {

        $usuario = $id;
        // $usuario = User::findOrFail($id);
        return view('admin.usuarios.password', compact('usuario'));
    }

    public function updateContraseña(ContraseñaRequest $request)
    {

        $usuario = User::findOrFail($request->id);
        $usuario->password;

        if (Hash::check($request->contraseña, $usuario->password)) {
            $usuario->password = bcrypt($request->nueva_contraseña);

            if ($usuario->save()) {
                alert()->success('Éxito al cambiar contraseña', 'Haz cambiado tu contraseña con éxito.');
                return redirect()->to(route('home'));
            }
        } else {
            alert()->error('Oops error', 'La contraseña actual no coincide.');
            return back();
        }
    }

    public function indexDelete()
    {
        $usuarios = User::onlyTrashed()->get();
        return view('admin.usuarios.indexdelete', compact('usuarios'));
    }

    public function usuarioRestore($id)
    {

        $usuario = User::find($id);
        User::onlyTrashed()->findOrFail($id)->restore();
        // alert()->success('Éxito usuario restablecido', 'Se ha restablecido el usuario.');
        return redirect()->to(route('admin.usuarios.index'));
    }
}
