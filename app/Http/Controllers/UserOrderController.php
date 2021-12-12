<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function getHistorialCompra()
    {

        $usuario_ordenes = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('status', '!=', '0')->get();


        return view('usuarios.history', compact('usuario_ordenes'));
    }


    public function getOrderShow($id)
    {

        $orden = Order::findOrFail($id);
        
        $orden_items = DB::table('orders')
            ->leftJoin('order_items', 'orders.id', '=', 'order_items.orden_id')
            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.status', '!=', '0')->get();

        // $order_item_address_states = DB::table('orders')
        //     ->leftJoin('user_address', 'orders.user_addeerss_id', '=', 'user_address.id')
        //     ->leftJoin('coverages', 'user_address.state_id', '=', 'coverages.id')
        //     ->get();

        // $order_item_address_cities = DB::table('orders')
        //     ->leftJoin('user_address', 'orders.user_addeerss_id', '=', 'user_address.id')
        //     ->leftJoin('coverages', 'user_address.city_id', '=', 'coverages.id')
        //     ->get();

        
        



        if ($orden->status == 0 || $orden->user_id !=  Auth::user()->id) {
            return redirect()->to(route('home'));
        }

        return view('usuarios.order_show', compact('orden', 'orden_items'));
    }
}
