<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
        'title',
        'detail',
        'price',
        'image'
    ];
    
}
