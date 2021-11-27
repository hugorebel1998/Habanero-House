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
        $coverturas = Coverage::orderBy('id', 'desc')->get();
        $valor_estados = Coverage::where('tipo_covertura', 0)->get();
        // $settings = Restaurant::select('id', 'valor_por_defecto')->get();
        $setting = Restaurant::pluck('valor_por_defecto')->first();

        return view('admin.covertura.index', compact('coverturas', 'setting', 'valor_estados'));
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
        } else {
            alert()->errror('Error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $covertura = Coverage::find($id);
        return view('admin.covertura.edit', compact('covertura'));
    }


    public function update(CovegareRequest $request, $id)
    {
        $covertura = Coverage::find($id);
        $restaurante = Restaurant::pluck('id')->first();
        $valor_estados = Coverage::where('tipo_covertura', 0)->get();
        // $restautante_valor = Restaurant::pluck('valor_por_defecto')->first();
        $covertura->status = $request->status;
        $covertura->nombre = $request->nombre;
        $covertura->tipo_covertura = $request->tipo_covertura;
        $covertura->state_id = $request->valor_estado;
        $covertura->precio = $request->precio;
        $covertura->restaurant_id  = $restaurante;
        $covertura->state_id = $request->valor_estado;

        // dd($covertura);
        if ($covertura->save()) {
            alert()->success('Covertura actalizada con éxito');
            return redirect()->to(route('admin.covertura.index'));
        } else {
            alert()->errror('Error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $covertura = Coverage::findOrFail($id);
        if ($covertura->delete()) {
            alert()->success('Covertura eliminada conéxito con éxito');
            return redirect()->to(route('admin.covertura.index'));
        }
    }

    public function indexDelete()
    {
        $coverturas = Coverage::onlyTrashed()->get();
        return view('admin.covertura.indexdelete', compact('coverturas'));

    }

    public function coverturaRestore($id)
    {

        $covertura = Coverage::find($id);
        Coverage::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->to(route('admin.covertura.index'));
    }

}
