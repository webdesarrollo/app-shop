<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable =[
        'nombre',
        'descripcon',
        'imagen',
    ];
    
    public function products(){ 
        //Una categoria tiene muchos productos
        return $this->hasMany(Product::class);
    }        
}
