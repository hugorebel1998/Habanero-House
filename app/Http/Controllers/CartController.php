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
        if (is_null($request->inventory)) {
            alert()->error('Porfavor selecciona un platillo');
            return redirect()->back();
            // } elseif (is_null($request->variant)) {
            //     alert()->error('Porfavor selecciona una variante');
            //     return redirect()->back();
        } else {
            $inventario = ProductInventary::where('id', $request->inventory)->count();


            if ($inventario == '0') {
                alert()->error('La opción seleccionada no éxiste');
                return redirect()->back();
            } else {
                $inventario = ProductInventary::find($request->inventory);
                if ($inventario->product_id != $id) {
                    alert()->error('No podemos agregar este platillo al carritoo de compras');
                    return redirect()->back();
                } else {

                    $orden = $this->getUserOrder();
                    $producto = Product::find($id);
                    if ($request->cantidad < 1) {
                        alert()->error('Error', 'Es necesario ingresar la cantidad que deseas ordenar');
                        return redirect()->back();
                    } else {
                        if (count(collect($inventario->getVariants)) > "0") {
                            if (is_null($request->variant)) {
                                alert()->error('Seleciona una variante para el platillo');
                                return redirect()->back();
                            }
                        }

                        $oitem = new OrdenItem();
                        $precio = $this->getCalcularPrecio($producto->indescuento, $producto->descuento, $inventario->precio);
                        $total = $precio * $request->cantidad;
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
                        $oitem->label_item = $label;
                        $oitem->cantidad = $request->cantidad;
                        $oitem->descuento_status = $producto->indescuento;
                        $oitem->descuento = $producto->descuento;
                        $oitem->precio_original = $inventario->precio;
                        $oitem->precio_unitario = $precio;
                        $oitem->total = $total;

                        // dd($oitem);
                        if ($oitem->save()) {
                            alert()->success('Platillo agregado al carrido de compras');
                            return redirect()->back();
                        }
                    }
                }
            }
            // dd($oitem);
        }
    }

    public function getCalcularPrecio($indescuento, $descuento, $precio )
    {
     $precio_final = $precio;
     if ($indescuento == "1") {
         $calcular_descuento = '0.'.$descuento;
         $calcular_descuento_valor = $precio * $calcular_descuento;
         $precio_final  = $precio - $calcular_descuento_valor;
     }
     return $precio_final;
    }
}
