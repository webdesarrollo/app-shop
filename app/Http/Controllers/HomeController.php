<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Cart;
use App\CartDetail;
use App\ProductImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user()->id;

        $detalles=DB::table('users as u')
                ->JOIN('carts as c','u.id','=','c.user_id')
                ->JOIN('cart_details as cd','cd.cart_id','=','c.id')
                ->JOIN('products as p','p.id','=','cd.product_id')
                ->JOIN('product_images as pi','pi.product_id','=','p.id')
                ->SELECT('p.id','pi.imagen as imagen','p.nombre as producto','p.precio as precio','cd.cantidad as cantidad','cd.id as cart_detalle')
                ->where('u.id','=',$user)
                ->where('c.estado','=','Active')
                ->get();
        return view('home',compact('detalles'));
    }
}
