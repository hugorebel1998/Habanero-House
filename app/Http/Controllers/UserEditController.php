<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function editarPerfil($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit_perfil', compact('usuario'));
        
    }

}
