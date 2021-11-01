<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ninguno(Request $request)
    {
        // $usuarioEmisor = User::find($request->id);
        // $email = env('MAIL_FROM_ADDRESS');
        // $usuarioReceptor = User


    }
}
