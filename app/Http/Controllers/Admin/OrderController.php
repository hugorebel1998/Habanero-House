<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotiForUserOrder;
use App\Order;
use App\Restaurant;
use App\User;
use App\UserAddes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $ordenes = Order::where('status', '!=', '0')->get();
        $usuarios = User::all();
        // $usuarios  = DB::table('users')
        //     ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        //     ->where('orders.status', '!=', '0')   
        //     ->get();
        return view('admin.ordenes.index', compact('ordenes', 'usuarios'));
    }

    public function ordenDomicilio()
    {

        $ordenes = Order::where('status', '!=', '0')->where('orden_tipo', 0)->get();
        $usuarios = User::all();
        // $usuarios  = DB::table('users')
        //     ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        //     ->where('orders.status', '!=', '0')
        //     ->get();

        return view('admin.ordenes.entrega_domicilio', compact('ordenes', 'usuarios'));
    }

    public function ordenToGo()
    {

        $ordenes = Order::where('status', '!=', '0')->where('orden_tipo', 1)->get();
        $usuarios = User::all();
        // $usuarios  = DB::table('users')
        //     ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        //     ->where('orders.status', '!=', '0')
        //     ->get();

        return view('admin.ordenes.ir_a_recoger', compact('ordenes', 'usuarios'));
    }


    public function show($id)
    {
        $orden = Order::find($id);
        
        // $usuario = User::find($orden->user_id);
        // $address = UserAddes::find($orden->user_addeerss_id);
        // $states = DB::table('orders')
        //               ->leftJoin('user_address', 'orders.user_addeerss_id', '=', 'user_address.id')
        //               ->leftJoin('coverages', 'user_address.state_id', '=', 'coverages.id')
        //               ->where('coverages.tipo_covertura',0)
        //               ->where('orders.id',$usuario->id)
        //               ->get();

        // $cities = DB::table('orders')
        //              ->leftJoin('user_address', 'orders.user_addeerss_id', '=', 'user_address.id')
        //              ->leftJoin('coverages', 'user_address.city_id', '=', 'coverages.id')
        //              ->where('coverages.tipo_covertura',1)
        //              ->where('orders.id',$usuario->id)
        //              ->get();
        // return $address;
        

        return view('admin.ordenes.show', compact('orden'));
    }


    public function storeOrder(Request $request,$id)
    {
        $orden = Order::find($id);
        $usuario = User::find($orden->user_id);
        $status_order = $request->status;
        $restaurante_nombre = Restaurant::pluck('nombre_razon_social')->first();
        $restaurante_telefono = Restaurant::pluck('telefono_razon_social')->first();
        $restaurante_email = Restaurant::pluck('email_razon_social')->first();
        $restaurante_ubicacion = Restaurant::pluck('direccion_razon_social')->first();
        
        $facebook = Restaurant::pluck('facebook')->first();
        $whatsapp = Restaurant::pluck('whatsapp')->first();
        $instagram = Restaurant::pluck('instagram')->first();

        $data = [
            'orden' => $orden, 'usuario' => $usuario, 'restaurante_nombre' => $restaurante_nombre,
            'restaurante_telefono' => $restaurante_telefono, 'restaurante_email' => $restaurante_email, 
            'restaurante_ubicacion' => $restaurante_ubicacion, 'facebook' => $facebook,'whatsapp' => $whatsapp, 
            'instagram' => $instagram, 'status_order' => $status_order,'numero_orden' => $orden->numero_orden

        ];        
        


        if ($status_order == '1' || $status_order == '2') {
            return back();
        }

        $orden->status = $status_order;
        if ($status_order == '3' && is_null($orden->fecha_pago_procesado)) {
            $orden->fecha_pago_procesado = date('Y-m-d h:i:s');
        }

        if ($status_order == '4' && is_null($orden->fecha_pago_enviado)) {
            $orden->fecha_pago_enviado = date('Y-m-d h:i:s');
        }

        if ($status_order == '5' && is_null($orden->fecha_pago_enviado)) {
            $orden->fecha_pago_enviado = date('Y-m-d h:i:s');
        }

        if ($status_order == '6' && is_null($orden->fecha_pago_entregado)) {
            $orden->fecha_pago_entregado = date('Y-m-d h:i:s');
        }

        if ($status_order == '100' && is_null($orden->fecha_pago_rechazado)) {
            $orden->fecha_pago_rechazado = date('Y-m-d h:i:s');
        }

        if ($orden->save()) {

            Mail::to($usuario->email)->send(new AdminNotiForUserOrder($data));
            alert()->success('Éxito has cambiado el estado de la orden.','Se le envío un correo electrónico al usuario de notificación');
            return back();
        }else{
            alert()->success('Error alcambiar el status de la orden.');
            return back();
        }

    }
}
