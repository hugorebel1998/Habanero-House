<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GaleryProduct extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'imagen', 'product_id'
    ];
}
