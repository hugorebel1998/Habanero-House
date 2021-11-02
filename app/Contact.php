<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'asunto','nombre', 'email' , 'descripcion', 'status'
    ];
}
