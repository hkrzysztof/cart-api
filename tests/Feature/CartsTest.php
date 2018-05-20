<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartsTest extends TestCase
{
    public function testSingleEmptyCartShowMethod()
    {
        $this->get('api/cart/1')
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'id' => 1,
                    'products' => [],
                    'items_in_cart' => '',
                    'total_price' => " USD"
                ]
            ]);
    }

    public function testSingleCartWithItemsShowMethod()
    {
        $this->get('api/cart/2')
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'items_in_cart' => '2',
                    'total_price' => "3.98 USD"
                ]
            ]);
    }

    public function testAddingOneProductToACart()
    {
        $product = [
            'cart_id' => 2,
            'product_id' => 2,
            'quantity' => 1
        ];

        $this->json('PUT', 'http://gogshop.local/api/cart', $product);
        $this->get('api/cart/2')
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'items_in_cart' => '3',
                    'total_price' => "6.97 USD"
                ]
            ]);
    }

    public function testAddingOverThreeProductsToACart()
    {
        $product = [
            'cart_id' => 2,
            'product_id' => 1,
            'quantity' => 2
        ];

        $this->json('PUT', 'http://gogshop.local/api/cart', $product)
            ->assertStatus(403);
    }

    public function testDeletingProductFromACart()
    {
        $product = [
            'cart_id' => 2,
            'product_id' => 1
        ];

        $this->json('DELETE', 'http://gogshop.local/api/cart', $product)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'id' => 2
                ]
            ]);
    }

    public function testEmptyingACart()
    {
        $product = [
            'cart_id' => 2,
            'product_id' => 'clear'
        ];

        $this->json('DELETE', 'http://gogshop.local/api/cart', $product)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'id' => 2
                ]
            ]);
    }

    public function testCreatingANewCartWithAProduct()
    {
        $product = [
            'product_id' => 2,
            'quantity' => 1
        ];

        $this->json('POST', 'http://gogshop.local/api/cart', $product)
            ->assertStatus(201)
            ->assertJson([
                "data" => [
                    'items_in_cart' => '1',
                    'total_price' => "2.99 USD"
                ]
            ]);
    }

    public function testCreatingANewCartWithTooManyProducts()
    {
        $product = [
            'product_id' => 2,
            'quantity' => 4
        ];

        $this->json('POST', 'http://gogshop.local/api/cart', $product)
            ->assertStatus(403);
    }

}