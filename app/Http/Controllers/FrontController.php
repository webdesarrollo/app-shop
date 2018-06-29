<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;
use DB;


class FrontController extends Controller
{
    public function index(){
      $productos=Product::take(3)->orderBy('created_at', 'DESC')->get();
      return view('welcome',compact('productos'));
    }

    public function show($id){
      $producto=Product::find($id);

      $imagenes=DB::table('products as p')
        ->JOIN('product_images as i','p.id','=','i.product_id')
        ->SELECT('i.imagen as nombre')
        ->where('p.id','=',$id)
        ->get();

      return view('producto.show',compact('producto','imagenes'));
    }

    public function showCategorias($id){
        $categoria=Category::find($id);
        return view('categorias.show',compact('categoria'));
    }
}
