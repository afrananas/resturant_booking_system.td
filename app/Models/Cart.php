<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
        'title',
        'details',
        'price',
        'image',
        'quantity',
        'userid',
        
    ];
    
}
