<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variants extends Model
{
    use SoftDeletes;


    protected $table = 'product_variants';

    protected $fillable = [
        'nombre', 'product_id', 'inventory_id'
    ];

   
}
