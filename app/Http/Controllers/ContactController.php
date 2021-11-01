<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function mostrar()
    {
        return view('mensajes.mostrar');
    }

    public function store(Request $request)
    {
        $mensaje = new Contact();

        $request->validate([
            'nombre' => 'required',
            'correo_electrónico'  => 'required',
            'descripción' => 'required|min:5'
        ]);

        $mensaje->nombre = $request->nombre;
        $mensaje->email = $request->correo_electrónico;
        $mensaje->descripcion = $request->descripción;

        // dd($mensaje);
        if ($mensaje->save()) {
            $mensaje->nombre = $request->nombre;
            $mensaje->email = $request->correo_electrónico;
            $mensaje->descripcion = $request->descripción;

            if ($mensaje->save()) {
                alert()->success('Mensaje enviado');
                return redirect()->to(route('usuario.mostrar.contacto'));
            } else {
                alert()->error('Ops no se envio el mensaje');
                return back();
            }
        }else{
            alert()->error('Ops no se envio el mensaje');
            return redirect()->to(route('usuario.mostrar.contacto'));
        }
    }
}
