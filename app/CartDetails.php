<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $table = "cart_details";
    
    protected $fillable = [
        'cantidad',
        'descuento',
        'cart_id',
        'product_id',    
    ];

}
