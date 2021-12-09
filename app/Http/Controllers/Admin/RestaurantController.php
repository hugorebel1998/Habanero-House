<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
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
        $restaurante->to_go = $request->to_go;
        $restaurante->metodo_por_efectivo = $request->metodo_por_efectivo;
        $restaurante->metodo_por_transferencia = $request->metodo_por_transferencia;
        $restaurante->metodo_por_paypal = $request->metodo_por_paypal;
        $restaurante->metodo_por_tarjeta = $request->metodo_por_tarjeta;
        $restaurante->whatsapp = $request->whatsapp;
        $restaurante->facebook = $request->facebook;
        $restaurante->instagram = $request->instagram;
        $restaurante->twitter = $request->twitter;
        $restaurante->youtube = $request->youtube;

        // dd($restaurante);
        if ($restaurante->save()) {
            alert()->success('Información actualizada');
            return redirect()->back();
        } else {
            alert()->error('Oops error', 'Algo salio mal');
            return redirect()->to(route('admin.ajustes.edit'));
        }
    }

    public function delete($id){
        $restaurante = Restaurant::findOrFail($id);
        $restaurante->delete();
        // alert()->success('Éxito al borrar ', 'Se ha borrado la categoria.');
        return back();
    }

    public function restaurantRestore($id)
    {

        $categoria = Restaurant::find($id);
        Restaurant::onlyTrashed()->findOrFail($id)->restore();
        // alert()->success('Éxito categoria restablecida', 'Se ha restablecido la categoria');
        return redirect()->back();
    }
}
