<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all carts
        $carts = Cart::paginate(3);

        // Return collection of carts as a resource
        return CartResource::collection($carts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // If request method is PUT

        if ($request->isMethod('put')){
            $cart = Cart::findOrFail($request->cart_id);

            $cart->id = $request->input('cart_id');
            $productId = $request->input('product_id');
            $productsAmount = $request->input('quantity');

            if(($cart->itemsInCart($cart->id) + $productsAmount) <=3 ){
                if($cart->save()) {
                    $cart->products()->attach($productId);
                    $cart->products()->updateExistingPivot($productId, ['quantity' => $productsAmount]);
                    return new CartResource($cart);
                }
            } else {
                return 'Your cart is full';
            }


        // If request method is POST

        } elseif ($request->isMethod('post')){
            $cart= new Cart;
            $productId = $request->input('product_id');
            $productsAmount = $request->input('quantity');

            if($productsAmount <= 3 ){
                if($cart->save()) {
                    $cart->products()->attach($productId);
                    $cart->products()->updateExistingPivot($productId, ['quantity' => $productsAmount]);
                    return new CartResource($cart);
                }
            } else {
                return 'You can add max 3 products to your cart';
            }


        //If request method is DELETE

        } elseif ($request->isMethod('delete')){
            $cart = Cart::findOrFail($request->cart_id);

            $cart->id = $request->input('cart_id');
            $productId = $request->input('product_id');

                if($cart->save()) {
                    // Option to make the cart empty
                    if($productId == 'clear'){
                        $cart->products()->detach();
                    } else {
                        $cart->products()->detach($productId);
                    }
                    return new CartResource($cart);
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a single cart
        $cart = Cart::findOrFail($id);

        //Return the single cart as a resource
        return new CartResource($cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get a single cart
        $cart = Cart::findOrFail($id);

        if($cart->delete()){
            return new CartResource($cart);
        }

    }
}
