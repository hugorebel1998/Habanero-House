<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GaleryProduct extends Model
{
    use SoftDeletes;

    protected $table = 'galery_products';
    
    protected $fillable = [
        'imagen', 'product_id'
    ];
}
