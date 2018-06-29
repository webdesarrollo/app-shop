<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nombre',
        'descripcion',
        'descripcion_larga',
        'precio',
        'category_id'
    ];

    public function category(){
        //un producto pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }


    public function getCategoryNameAttribute(){
      if($this->category)
      return $this->category->nombre;
      return 'General';
    }
}
