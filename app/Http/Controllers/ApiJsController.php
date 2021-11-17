<?php

namespace App\Http\Controllers;

use App\ProductInventary;
use Illuminate\Http\Request;

class ApiJsController extends Controller
{

    public function productInventory($id){
        $query = ProductInventary::find($id);
        return response()->json($query->getVariants);

    }
}
