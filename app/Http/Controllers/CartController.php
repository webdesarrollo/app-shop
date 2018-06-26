<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
      $cart = auth()->user()->getCartIdAttribute();
      $cart->estado='Pendiente';
      $cart->save();
      $notificacion='Tu pedido se ha registrado correctamente.Te contactaremos por mail';
      return back()->with(compact('notificacion'));
    }
}
