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

        if ($request->status == '1' || $request->status == '2') {
            return back();
        }

        $orden->status = $request->status;
        if ($request->status == '3' && is_null($orden->fecha_pago_procesado)) {
            $orden->fecha_pago_procesado = date('Y-m-d h:i:s');
        }

        if ($request->status == '4' && is_null($orden->fecha_pago_enviado)) {
            $orden->fecha_pago_enviado = date('Y-m-d h:i:s');
        }

        if ($request->status == '5' && is_null($orden->fecha_pago_enviado)) {
            $orden->fecha_pago_enviado = date('Y-m-d h:i:s');
        }

        if ($request->status == '6' && is_null($orden->fecha_pago_entregado)) {
            $orden->fecha_pago_entregado = date('Y-m-d h:i:s');
        }

        if ($orden->save()) {
            alert()->success('Éxito has cambiado el status de la orden.');
            return back();
        }else{
            alert()->success('Error alcambiar el status de la orden.');
            return back();
        }

    }
}
