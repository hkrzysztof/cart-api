<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get products
        $products = Product::paginate(3);

        // Return collection of products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if method is post or put
        $product = $request->isMethod('put') ? Product::findOrFail($request->product_id) : new Product;

        // Set attributes
        $product->id = $request->input('product_id');
        $product->title = $request->input('title');
        $product->price = $request->input('price');

        //Return resource
        if($product->save()) {
            return new ProductResource($product);
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
        //Get a single product
        $product = Product::findOrFail($id);

        //Return the single product as a resource
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get a single product
        $product = Product::findOrFail($id);

        if($product->delete()){
            return new ProductResource($product);
        }
    }
}
