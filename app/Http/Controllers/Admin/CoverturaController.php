<?php

namespace App\Http\Controllers\Admin;

use App\Coverage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CovegareRequest;
use App\Restaurant;
use Illuminate\Http\Request;

class CoverturaController extends Controller
{
    public function index()
    {
        $valor_estados = Coverage::where('tipo_covertura', 0)->get();
        // $settings = Restaurant::select('id', 'valor_por_defecto')->get();
        $setting = Restaurant::pluck('valor_por_defecto')->first();

        return view('admin.covertura.index', compact('setting', 'valor_estados'));
    }
    
    public function store(CovegareRequest $request)
    {
        $restaurante = Restaurant::pluck('id')->first();
        // $restautante_valor = Restaurant::pluck('valor_por_defecto')->first();
        $coverage = new Coverage();
        $coverage->nombre = $request->nombre;
        $coverage->tipo_covertura = $request->tipo_covertura;
        $coverage->state_id = $request->valor_estado;
        $coverage->precio = $request->precio;
        $coverage->restaurant_id  = $restaurante;
      
        // dd($coverage);
        if ($coverage->save()) {
            alert()->success('Covertura guardada con éxito');
            return redirect()->to(route('admin.covertura.index'));
        }else{
            alert()->errror('Error');
            return redirect()->back();
        }
        
        
    }
}
