<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\cart;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    public function getCartIdAttribute(){
        $cart=$this->carts()->where('estado','Active')->first();
        if($cart){
            return $cart;
        }
        $cart = new Cart();
        $cart->estado='Active';
        $cart->user_id=$this->id;
        $cart->save();
        return $cart;
    }
    
    
}
