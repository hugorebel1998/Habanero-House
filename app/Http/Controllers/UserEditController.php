<?php

namespace App\Http\Controllers;

use App\Coverage;
use App\Http\Requests\ContraseñaRequest;
use App\User;
use App\UserAddes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $states = Coverage::where('tipo_covertura', 0)->select('id', 'nombre')->get();
        // $states  = Coverage::where('tipo_covertura', 0)->pluck('id', 'nombre');
        $direcciones = UserAddes::select('id', 'nombre', 'calle_av', 'casa_dp', 'referencia')
            ->orderBy('id', 'ASC')->get();

        return view('usuarios.address', compact('states', 'direcciones'));
    }

    public function storeAddress(Request $request)
    {

        
        $request->validate([
            'nombre_referencia' => 'required',
            'calle_o_avenida' => 'required',
            'casa_o_departamento' => 'required',
            'referencia' => 'required'
        ]);
        
        
        $direccion = new UserAddes();
        $direccion->user_id = Auth::id();
        $direccion->state_id = $request->state;
        $direccion->city_id = $request->city;
        $direccion->nombre = $request->nombre_referencia;
        $direccion->calle_av = $request->calle_o_avenida;
        $direccion->casa_dp = $request->casa_o_departamento;
        $direccion->referencia = $request->referencia;

        if (count(collect(Auth::user()->getAddress)) == '0') {

            $direccion->direccion_default = '1';
        }

        if ($direccion->save()) {

            alert()->success('Ubicación agregada con éxito');
            return redirect()->back();
        } else {
            alert()->error('Error');
            return redirect()->back();
        }
    }

    public function getAccounAddressDefault(UserAddes $direccion)
    {
        // return  Auth::user()->getAddressDefault->id;
        // dd(Auth::user()->id != $direccion->user_id);
        if (Auth::id() != $direccion->user_id) {
            // dd(Auth::user() != $address->user_id);
            alert()->error('No puedes editar esta dirección de entrega');
            return redirect()->back();
        } 

        // dd(Auth::user()->getAddressDefault->id);
        $defa = Auth::user()->getAddressDefault->id;
        $defa = UserAddes::find(Auth::user()->getAddressDefault->id);
        $defa->direccion_default = '0';
        $defa->save();

        $direccion->direccion_default = '1';
        if ($direccion->save()) {
            alert()->success('éxito');
            return redirect()->back();
        }


    }

    public function deleteAddrees($id)
    {
        $direccion = UserAddes::findOrFail($id);
        $direccion->delete();
        // alert()->success('Éxito al borrar ', 'Se ha borrado la categoria.');
        return back();
    }
}
