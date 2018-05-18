<?php

namespace App\Http\Resources;

use App\Cart;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cart = Cart::find($this->id);
//        $total = $cart
        if($request->isMethod('delete')) {
            return [
                'id' => $this->id,
            ];
        } else {
            return [
                'id' => $this->id,
                'products' => $cart->products->all(),
                'items_in_cart' => $this->itemsInCart($this->id),
                'total_price' => $this->cartTotalPrice($this->id) . ' USD'
            ];
        }

    }
}
