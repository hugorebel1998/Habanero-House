<?php

namespace App\Http\Controllers;

use App\OrdenItem;
use App\Order;
use App\Product;
use App\ProductInventary;
use App\Variants;
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
        // $orden_id = $this->getUserOrder()->i
        $items = $orden->getItems;

        return view('cart.index', compact('orden', 'items'));
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
    public function postCart(Request $request, $id)
    {
        $orden = $this->getUserOrder();
        $producto = Product::find($id);
        $inventario = ProductInventary::find($request->inventory);

        if ($request->cantidad < 1) {
            alert()->error('Error', 'Es necesario ingresar la cantidad que deseas ordenar');
            return redirect()->back();
        } else {
            $oitem = new OrdenItem();
            $total = $producto->precio * $request->cantidad;
            if ($request->variant) {
                $variante = Variants::find($request->variant);
                $variante_label = '/' . $variante->nombre;
            } else {
                $variante_label = '';
            }
            $label = $producto->nombre . '/' . $inventario->nombre . $variante_label;
            $oitem->user_id = Auth::user()->id;
            $oitem->orden_id = $orden->id;
            $oitem->product_id = $id;
            $oitem->inventory_id = $request->inventory;
            $oitem->variant_id = $request->variant;
            $oitem->variant_id = $request->variant;
            $oitem->label_item = $label;
            $oitem->cantidad = $request->cantidad;
            $oitem->descuento_status = $producto->indescuento;
            $oitem->descuento = $producto->descuento;
            $oitem->precio_unitario = $producto->precio;
            $oitem->total = $total;

            if ($oitem->save()) {
                alert()->success('Platillo agregado al carrido de compras');
                return redirect()->back();
            }
        }

        // dd($oitem);
    }
}
