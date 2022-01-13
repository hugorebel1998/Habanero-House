<?php

namespace App\Http\Controllers;

use App\Mail\OrderSedDetail;
use App\Mail\OrderSedDetailAdmin;
use App\Order;
use App\Restaurant;
use App\User;
use App\UserAddes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificacionesController extends Controller
{

    public function getDetailOrder($id)
    {
 
        $orden = Order::find($id);
        $usuario = User::find($orden->user_id);
        $administrador = User::where('permiso', '1')->get();
        $direccion = UserAddes::find($orden->user_addeerss_id);
        
        // dd($administrador);
        $restaurante_nombre = Restaurant::pluck('nombre_razon_social')->first();
        $restaurante_telefono = Restaurant::pluck('telefono_razon_social')->first();
        $restaurante_email = Restaurant::pluck('email_razon_social')->first();
        $restaurante_ubicacion = Restaurant::pluck('direccion_razon_social')->first();
        
        $facebook = Restaurant::pluck('facebook')->first();
        $whatsapp = Restaurant::pluck('whatsapp')->first();
        $instagram = Restaurant::pluck('instagram')->first();

        
        $data = [
            'orden' => $orden, 'usuario' => $usuario, 'direccion' => $direccion, 'restaurante_nombre' => $restaurante_nombre,
            'restaurante_telefono' => $restaurante_telefono, 'restaurante_email' => $restaurante_email, 
            'restaurante_ubicacion' => $restaurante_ubicacion, 'facebook' => $facebook,'whatsapp' => $whatsapp, 'instagram' => $instagram

        ];

        if($orden->status == 1){
             Mail::to($usuario->email)->send(new OrderSedDetail($data));
             alert()->success('Exito', 'Tu orden se pago con éxito, en breve te llegara un mensaje a tu correo electrónico');
            //  return redirect()->to(route('usuario.edit.perfil',));
        }elseif(!$orden){
            alert()->error('Oops error');
            return redirect()->back();

        }        

        foreach($this->getAdminEmails() as $admin){
            // $data = ['orden' => $orden,];
            $data = [
                'orden' => $orden, 'usuario' => $usuario, 'name' => $admin->name. ' '.$admin->apellido_paterno,'direccion' => $direccion, 'restaurante_nombre' => $restaurante_nombre,
                'restaurante_telefono' => $restaurante_telefono, 'restaurante_email' => $restaurante_email, 
                'restaurante_ubicacion' => $restaurante_ubicacion, 'facebook' => $facebook,'whatsapp' => $whatsapp, 'instagram' => $instagram
    
            ];
            Mail::to($admin->email)->send(new OrderSedDetailAdmin($data));

        }
        
    }


    public function getAdminEmails()
    {
        return DB::table('users')->where('permiso', '1')->get();
    }
}
