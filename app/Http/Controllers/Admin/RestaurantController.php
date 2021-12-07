<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('isAdmin');
    // }
    public function index()
    {
        $restaurante = Restaurant::firstWhere('nombre_razon_social', 'Habanero House');
        return view('admin.restaurante.index', compact('restaurante'));
    }
    public function edit($id)
    {
        $restaurante = Restaurant::findOrFail($id);
        return view('admin.restaurante.edit', compact('restaurante'));
    }

    public function update(Request $request){
        $id = $request->id_restaurant;
        $restaurante = Restaurant::findOrFail($id);

        $request->validate([
         'nombre_encargado' => 'required',
         'teléfono' => 'required|numeric'    
        ]);

        $restaurante->nombre_encargado = $request->nombre_encargado;
        $restaurante->nombre_razon_social = $request->nombre_razón_social;
        $restaurante->telefono_razon_social = $request->teléfono;
        $restaurante->monto_minimo_de_compra = $request->monto_minimo_de_compra;
        $restaurante->direccion_razon_social = $request->dirección;
        $restaurante->email_razon_social = $request->correo_electrónico;
        $restaurante->mantenimiento = $request->mantenimiento;
        $restaurante->precio_envio = $request->precio_envio;
        $restaurante->valor_por_defecto = $request->valor_por_defecto;
        $restaurante->cantidad_de_envio_min = $request->cantidad_de_envio_min;

        // dd($restaurante);
        if ($restaurante->save()) {

            alert()->success('Información actualizada');
            return redirect()->back();

        } else {

            alert()->error('Oops error', 'Algo salio mal');
            return redirect()->to(route('admin.ajustes.edit'));
        }

    }
}
