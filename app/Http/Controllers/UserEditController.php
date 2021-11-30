<?php

namespace App\Http\Controllers;

use App\Coverage;
use App\Http\Requests\ContraseñaRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editarPerfil($id)
    {
        $perfile = User::findOrFail($id);
        return view('usuarios.edit_perfil', compact('perfile'));
    }

    public function updatePerfile(Request $request, $id)
    {

        $perfile = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:13',
            'apellido_paterno' => 'required|max:15',
            'apellido_materno' => 'required|max:15',
            'fecha_de_nacimiento' => 'required',
            'teléfono' => 'min:10|required|numeric',
            'correo_electrónico' => 'required|email|unique:users,email,' . $perfile->id,
        ]);

        $perfile->name = $request->nombre;
        $perfile->apellido_paterno = $request->apellido_paterno;
        $perfile->apellido_materno = $request->apellido_materno;
        $perfile->fecha_nacimiento = $request->fecha_de_nacimiento;
        $perfile->telefono = $request->teléfono;
        $perfile->email = $request->correo_electrónico;
        $perfile->editor_id = auth()->user()->id;

        if ($archivo = $request->file('imagen')) {
            $nombre_imagen = $archivo->getClientOriginalName();
            $ruta = public_path('img/users/');
            $archivo->move($ruta, $nombre_imagen);
            $perfile['imagen_usuario'] = $nombre_imagen;
        }

        // dd($perfile);
        if ($perfile->save()) {
            $perfile->name = $request->nombre;
            $perfile->apellido_paterno = $request->apellido_paterno;
            $perfile->apellido_materno = $request->apellido_materno;
            $perfile->fecha_nacimiento = $request->fecha_de_nacimiento;
            $perfile->telefono = $request->teléfono;
            $perfile->email = $request->correo_electrónico;
            $perfile->editor_id = auth()->user()->id;

            if ($perfile->save()) {
                alert()->success('Tu información se guardo con éxito');
                return redirect()->to(route('usuario.edit.perfil', $perfile->id));
            } else {
                alert()->error('Oops algo salio mal');
                return redirect()->back();
            }
        } else {
            alert()->error('Oops error', 'Al parecer tuvimos un error.');
            return redirect()->to(route('admi.usuarios.create'));
        }
    }

    public function contraseñaPerfil($id)
    {

        $perfile = $id;
        return view('usuarios.contraseña_perfil', compact('perfile'));
    }

    public function contraseñaUpdatePerfil(ContraseñaRequest $request)
    {
        $perfile = User::findOrFail($request->id);
        $perfile->password;

        if (Hash::check($request->contraseña, $perfile->password)) {
            $perfile->password = bcrypt($request->nueva_contraseña);

            if ($perfile->save()) {
                alert()->success('Éxito cambiaste tu contraseña');
                return redirect()->to(route('usuario.edit.perfil', $perfile->id));
            }
        } else {
            alert()->error('Oops error', 'La contraseña actual no coincide.');
            return back();
        }


    }

    public function address()
    {
        $coverturas = Coverage::where('tipo_covertura', 0)->select('id', 'nombre')->get();
        return view('usuarios.address', compact('coverturas'));

    }
}
