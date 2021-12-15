<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use App\UserAddes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $usuarios  = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '!=', '0')
            ->get();
        //dd($usuarios);
        return view('admin.ordenes.index', compact('ordenes', 'usuarios'));
    }

    public function ordenDomicilio()
    {

        $ordenes = Order::where('status', '!=', '0')->where('orden_tipo', 0)->get();
        $usuarios  = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '!=', '0')
            ->get();

        return view('admin.ordenes.entrega_domicilio', compact('ordenes', 'usuarios'));
    }

    public function ordenToGo()
    {

        $ordenes = Order::where('status', '!=', '0')->where('orden_tipo', 1)->get();
        $usuarios  = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '!=', '0')
            ->get();

        return view('admin.ordenes.ir_a_recoger', compact('ordenes', 'usuarios'));
    }


    public function show($id)
    {
        $orden = Order::findOrFail($id);
        $usuarios  = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '!=', '0')
            ->get();



            $user_states = DB::table('user_address')
            ->leftJoin('orders', 'user_address.user_id', '=', 'orders.id')
            ->leftJoin('coverages', 'user_address.state_id', '=', 'coverages.id')
            ->where('orders.user_id ', '==' ,'orders.id')
            ->where('coverages.tipo_covertura', 0)
            ->get();
    
        $user_cities = DB::table('user_address')
            ->leftJoin('coverages', 'user_address.city_id', '=', 'coverages.id')
            ->where('coverages.tipo_covertura', 1)
            ->leftJoin('orders', 'user_address.id', '=', 'orders.user_addeerss_id')    
            ->get();
    
           
            
        

      dd($user_states);



        return view('admin.ordenes.show', compact('orden', 'usuarios', 'user_states', 'user_cities'));
    }
}
