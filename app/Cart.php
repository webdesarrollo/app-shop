<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    
    protected $fillable = [
        'order_date',
        'arrived_date',
        'estado',
        'user_id',
    ];
}
