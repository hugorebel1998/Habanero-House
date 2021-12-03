<?php

namespace App\Http\Controllers;

use App\OrdenItem;
use App\Order;
use App\Product;
use App\ProductInventary;
use App\Restaurant;
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
        $envio = $this->getValorEnvio($orden->id);
        $items = $orden->getItems;
        return view('cart.index', compact('orden', 'items', 'envio'));
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

    public function getValorEnvio($order_id)
    {
        $orden = Order::find($order_id);
        // var_dump(json_encode($orden));
        // die();
        $metodo_envio = Restaurant::select('precio_envio')->get();
        $precio = '0';
        if ($metodo_envio == '0') {
            if (isset($precio)) {
                '0.00';
            }
        } else {
            # code...
        }
        
        var_dump(json_encode($precio));
        die();
        
           


    }
    public function postCart(Request $request, $id)
    {
        //Validacion de Inventario producto
        if (is_null($request->inventory)) {
            alert()->error('Selecciona un platillo');
            return redirect()->back();
        } else {
            $inventario = ProductInventary::where('id', $request->inventory)->count();
            if ($inventario == '0') {
                alert()->error('La opción selecionada no esta disponible');
                return redirect()->back();
            } else {
                $inventario = ProductInventary::find($request->inventory);
                if ($inventario->product_id != $id) {
                    alert()->error('No se puede agregar este platillo alcarrito');
                    return redirect()->back();
                }
            }
        }
        //Validacion de existencia de inventario
        if ($inventario->limitado_inventario == '0') {
            if ($request->cantidad > $inventario->cantidad_inventario) {
                alert()->error('No contamos con esa cantidad en el inventario');
                return redirect()->back();
            }
        }


        // Validacion de Variante Productos
        if (count(collect($inventario->getVariants)) > "0") {
            if (is_null($request->variant)) {
                alert()->error('Seleciona una variante para el platillo');
                return redirect()->back();
            }
        }
        if (!is_null($request->variant)) {
            $variante = Variants::where('id', $request->variant)->count();

            if ($variante == '0') {
                alert()->error('La variante opción selecionada no esta disponible');
                return redirect()->back();
            }
        }


        // Validar que la cantidad siempre sea uno 
        if ($request->cantidad < 1) {
            alert()->error('Es necesario ingresar la cantidad que deseas ordenar');
            return redirect()->back();
        }
        // Validar que la variente traiga informacion
        if ($request->variant) {
            $variante = Variants::find($request->variant);
            $variante_label = ' / ' . $variante->nombre;
        } else {
            $variante_label = '';
        }
        $orden = $this->getUserOrder();
        $producto   = Product::find($id);
        $inventario = ProductInventary::find($request->inventory);

        // Operacion para sacar el total del platillo precio * cantidad
        $precio = $this->getCalcularPrecio($producto->indescuento, $producto->descuento, $inventario->precio);
        $total = $precio * $request->cantidad;

        //Validacion para orden existente en el carrito de compras
        $orden_existente = OrdenItem::where('orden_id', $orden->id)->where('product_id', $producto->id)->count();
        if ($orden_existente == 0) {

            $orden_item = new OrdenItem();
            $label = $producto->nombre . '/' . $inventario->nombre . $variante_label;
            $orden_item->user_id          = Auth::user()->id;
            $orden_item->orden_id         = $orden->id;
            $orden_item->product_id       = $id;
            $orden_item->inventory_id     = $request->inventory;
            $orden_item->variant_id       = $request->variant;
            $orden_item->label_item       = $label;
            $orden_item->cantidad         = $request->cantidad;
            $orden_item->descuento_status = $producto->indescuento;
            $orden_item->descuento        = $producto->descuento;
            $orden_item->fecha_caduca_descuento   = $producto->fecha_caduca_descuento;
            $orden_item->precio_original  = $inventario->precio;
            $orden_item->precio_unitario  = $precio;
            $orden_item->total            = $total;
            // dd($orden_item);

            if ($orden_item->save()) {
                alert()->success('Platillo agregado al carrito');
                return redirect()->back();
            } else {
                alert()->error('Ops no sepuedo agregar el platillo alcarrito');
                return redirect()->back();
            }
        } else {
            alert()->error('Este platillo ya se encuentra en tu carrito de compras');
            return redirect()->back();
        }
    }

    public function updateCart(Request $request, $id)
    {

        $orden = $this->getUserOrder();
        $orden_item = OrdenItem::find($id);
        $inventario = ProductInventary::find($orden_item->inventory_id);

        if ($orden->id != $orden_item->orden_id) {
            alert()->error('No podemos actualizar la cantidad de este platillo');
            return redirect()->back();
        } else {
            if ($inventario->limitado_inventario == '0') {
                if ($request->cantidad > $inventario->cantidad_inventario) {
                    alert()->error('La cantidad ingresada supera el inventario');
                    return redirect()->back();
                }
            }
        }
        $orden_item->cantidad = $request->cantidad;
        $total = $orden_item->precio_unitario * $request->cantidad;
        $orden_item->total = $total;

        if ($orden_item->save()) {
            alert()->success('Cantidad actualizada');
            return redirect()->back();
        }
    }

    public function deleteCart($id)
    {
        $orden_item = OrdenItem::find($id);
        if ($orden_item->delete()) {
            return back();
        }
    }



    public function getCalcularPrecio($indescuento, $descuento, $precio)
    {
        $precio_final = $precio;
        if ($indescuento == "1") {
            $calcular_descuento = '0.' . $descuento;
            $calcular_descuento_valor = $precio * $calcular_descuento;
            $precio_final  = $precio - $calcular_descuento_valor;
        }
        return $precio_final;
    }
}
