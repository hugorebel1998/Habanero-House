<?php

namespace App\Http\Controllers;

use App\Order;
use App\Restaurant;
use App\User;
use App\UserAddes;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    
    public function getDetailOrder($id)
    {
        
        $restaurante = Restaurant::select('facebook','whatsapp','instagram','metodo_por_efectivo', 'nombre_razon_social','telefono_razon_social','email_razon_social', 'direccion_razon_social')
                                   ->where('id','=','1')->get();
        $orden = Order::find($id);
        $usuario = User::find($orden->user_id);
        $direccion = UserAddes::find($orden->user_addeerss_id);
        // dd($direccion->nombre);
        return view('notificaciones.mensaje1',compact('orden','usuario','restaurante', 'direccion'));
    }
}
