<?php

namespace App\Http\Controllers;

use App\OrdenItem;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderHistoryController extends Controller
{
    public function __construct()
    {
        
        return $this->middleware('auth');
    }

    public function getHistorialCompra()
    {

        // $usuario_ordenes = DB::table('users')
        //                  ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        //                  ->where('orders.status', '!=', '0')
        //                  ->get();
        

        return view('usuarios.history');
    }



    public function getOrderShow($id)
    {

        $orden = Order::findOrFail($id);
        
        $usuario = User::find($orden->user_id);
        
        
        if ($orden->status == 0 || $orden->user_id !=  Auth::user()->id) {
            return redirect()->to(route('home'));
        }
        
        
        // $orden_items = DB::table('order_items')
        //                   ->leftJoin('orders', 'order_items.orden_id', '=', 'orders.id')
        //                   ->leftJoin('products', 'order_items.product_id', '=', 'products.id')                         
        //                   ->where('orders.id', $usuario->id)
        //                   ->where('order_items.orden_id','==',$orden->id)
        //                   ->where('orders.status', '!=', '0')
        //                   ->get();
        // return$orden_items;
        
        return view('usuarios.order_show', compact('orden'));
    }
}
