<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailable;
use App\User;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
        
    }

    public function index()
    {
        $date = Carbon::now();
        $mensajes = Contact::select('id','nombre', 'email', 'created_at')
                            ->where('status', 0)->get();
        $date = $date->toFormattedDateString();
        return view('admin.mensajes.index', compact('mensajes'));

    }

    public function ContactanosMensaje($id){
        $mensaje = Contact::findOrFail($id);

        
            Mail::to($mensaje->email)->send(new ContactMailable($mensaje));
            alert()->success('Éxito mensaje enviado');
            return redirect()->to(route('admin.contacto.index'));
        

        

        
    }

    public function show($id)
    {

    }

    public function delete($id)
    {
        


    }
}
