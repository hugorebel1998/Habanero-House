<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    
    public function getDetailOrder($id)
    {
        $orden = Order::find($id);
        $usuario = User::find($orden->user_id);
        return view('notificaciones.mensaje1',compact('orden','usuario'));
    }
}
