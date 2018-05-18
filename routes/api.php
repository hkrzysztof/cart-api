<?php

use App\Cart;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// PRODUCTS API LINKS

// List all products
Route::get('products', 'ProductApiController@index');

// Show a single product
Route::get('product/{id}', 'ProductApiController@show');

// Create a new product
Route::post('product', 'ProductApiController@store');

// Update a product
Route::put('product', 'ProductApiController@store');

// Delete a product
Route::delete('product/{id}', 'ProductApiController@destroy');


// CARTS API LINKS

// List all carts
Route::get('carts', 'CartApiController@index');

// Show a single cart
Route::get('cart/{id}', 'CartApiController@show');

// Create a new cart (empty or with items)
Route::post('cart', 'CartApiController@store');

// Update a cart / items in cart
Route::put('cart', 'CartApiController@store');

// Delete items from cart
Route::delete('cart', 'CartApiController@store');

// Delete a cart
Route::delete('cart/{id}', 'CartApiController@destroy');

Route::get('test', function() {
    $cart = Cart::find(1);
//    dd($cart->products);
//    $itemsAmount = '';
//    $itemsTotal ='';
//    foreach ($cart->products as $product){
//        $itemsAmount = (int)$itemsAmount + (int)$product->pivot->quantity;
//        $itemsTotal = (float)$itemsTotal + ((int)$product->pivot->quantity * (float)$product->price);
//    }
//    echo $itemsAmount;
//    echo '<br>';
//    echo $itemsTotal;
    dd($cart->products[0]->pivot->quantity);
});