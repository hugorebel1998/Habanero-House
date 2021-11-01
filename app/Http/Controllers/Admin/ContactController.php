<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function show($id)
    {

    }

    public function delete($id)
    {
        


    }
}
