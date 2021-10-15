<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Functions;

class CategoryController extends Controller
{
    function index(){
        return view('categorias.index');

    }
    function create(){
        
        return view('categorias.create');



    }
}
