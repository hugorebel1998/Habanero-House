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



        $user_state = DB::table('user_address')
            ->leftJoin('coverages', 'user_address.id', '=', 'coverages.state_id')
            ->leftJoin('orders', 'user_address.id', '=', 'orders.user_addeerss_id')
            ->get();

            $user_city = DB::table('coverages')
            ->join('user_address', function ($join) {
                $join->on('coverages.id', '=', 'user_address.id');
                     
            })
            ->get();
        

        dd($user_state, $user_city);

        // $user_city = DB::table('coverages')
        //     ->leftJoin('user_address', 'coverages.id', '=', 'user_address.city_id')
        //     ->leftJoin('orders', 'user_address.id','=','orders.user_addeerss_id')
        //     ->where('coverages.tipo_covertura', 1)

        //     ->get();




        return view('admin.ordenes.show', compact('orden', 'usuarios'));
    }
}
