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
        $settings = Restaurant::select('id', 'valor_por_defecto')->get();
        return view('admin.covertura.index', compact('settings', 'valor_estados'));
    }
    
    public function store(CovegareRequest $request)
    {
        $restaurante = Restaurant::where('id','=' ,1)->select('vañpr_por_defecto');
        $coverage = new Coverage();
        $coverage->nombre = $request->nombre;
        $coverage->tipo_covertura = $request->tipo_covertura;
        $coverage->state_id = $request->valor_estado;
        $coverage->precio = $restaurante;

        dd($coverage);
    }
}
