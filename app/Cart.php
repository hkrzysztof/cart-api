<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'created_at', 'updated_at'
    ];

    public function products() {
        return $this->belongsToMany('App\Product')
            ->withPivot(['quantity']);
    }

    public function cartTotalPrice($cart_id) {
        $cart = Cart::find($cart_id);
        $itemsTotal ='';
        foreach ($cart->products as $product){
            $itemsTotal = (float)$itemsTotal + ((int)$product->pivot->quantity * (float)$product->price);
        }
        return $itemsTotal;
    }

    public function itemsInCart($cart_id) {
        $cart = Cart::find($cart_id);
        $itemsAmount = '';
        foreach ($cart->products as $product){
            $itemsAmount = (int)$itemsAmount + (int)$product->pivot->quantity;
        }
        return $itemsAmount;
    }

    public function lessThanFour($cart_id){
        return $this->itemsInCart($cart_id) < 3 ? true : false;
    }
}
