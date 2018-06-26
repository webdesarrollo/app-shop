<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartDetalle= new CartDetail();
        $cartDetalle->cart_id=auth()->user()->getCartIdAttribute()->id;
        $cartDetalle->product_id=$request->product_id;
        $cartDetalle->cantidad=$request->cantidad;
        $cartDetalle->save();
        $notificacion = 'El producto se ha cargado con exito al carrito';
        return back()->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartDetalle=CartDetail::find($id);
        $userCart=auth()->user()->getCartIdAttribute()->id;

        if($cartDetalle->cart_id == $userCart){
            $cartDetalle->delete();
        }
        $notificacion = 'El producto se ha eliminado del carrito';
        return back()->with(compact('notificacion'));
    }
}
