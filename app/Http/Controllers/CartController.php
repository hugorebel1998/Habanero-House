<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function getCart()
    {
        $orden = $this->getUserOrder();
        $orden_id = $this->getUserOrder()->id;
        return count(collect($orden->getItems));
        return view('cart.index');
    }

    public function getUserOrder()
    {
        $orden = Order::where('status', '0')->count();
        if ($orden == '0') {

            $orden = new Order();
            $orden->user_id = Auth::user()->id;
            $orden->save();

        } else {
            $orden = Order::where('status', '0')->first();
        }
        return $orden;
        
    }
}
