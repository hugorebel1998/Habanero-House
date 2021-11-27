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
        // $valor_estados = Coverage::where('tipo_covertura', 0)->get();
        // $settings = Restaurant::select('id', 'valor_por_defecto')->get();
        // $setting = Restaurant::pluck('valor_por_defecto')->first();

        return view('admin.covertura.index', compact('coverturas'));
    }

    public function store(CovegareRequest $request)
    {
        $restaurante = Restaurant::pluck('id')->first();
        // $restautante_valor = Restaurant::pluck('valor_por_defecto')->first();
        $coverage = new Coverage();
        $coverage->nombre = $request->nombre;
        $coverage->status = $request->status;
        $coverage->tipo_covertura = 0;
        $coverage->state_id = 0;
        $coverage->precio = 0;
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
        // $restautante_valor = Restaurant::pluck('valor_por_defecto')->first();
        $covertura->status = $request->status;
        $covertura->nombre = $request->nombre;
        $covertura->tipo_covertura = 0;
        $covertura->state_id = 0;
        $covertura->precio = 0;
        $covertura->restaurant_id  = $restaurante;


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


    public function localidad($id){
        $localidad = Coverage::where('state_id', $id)->get();
        return view('admin.covertura.localidad',compact('localidad'));

    }
}
