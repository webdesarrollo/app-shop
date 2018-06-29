<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request){
      $query = trim($request->get('query'));
      $productos=Product::where('nombre','like','%'.$query.'%')->get();
      return view('admin.search.show')->with(compact('productos','query'));
    }

    public function data(){
      $productos=Product::pluck('nombre');
      return $productos;
    }
}
