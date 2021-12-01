<?php

namespace App\Http\Controllers;

use App\Coverage;
use App\ProductInventary;
use Illuminate\Http\Request;

class ApiJsController extends Controller
{

    public function productInventory($id){
        $query = ProductInventary::find($id);
        return response()->json($query->getVariants);

    }

     public function postCoverageCities($state)
    {
         $cities = Coverage::where('tipo_covertura',1)
                            ->where('state_id', $state)
                            ->select('id', 'nombre')->get();
         return response()->json($cities);

     }
}
