<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = "cart_details";
    
    protected $fillable = [
        'cantidad',
        'descuento',
        'cart_id',
        'product_id',    
    ];
    
    public function producto()
    {
        return $this->belongsTo(Product::class);    
    }

}
