<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    public function testProductsListAndPagination()
    {
        $this->get('api/products')
            ->assertStatus(200)
            ->assertJsonCount(3, $key = 'data');

    }

    public function testSingleProductShowMethod()
    {
        $this->get('api/product/1')
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'id' => 1,
                    'title' => 'Fallout',
                    'price' => '1.99 USD'
                ]
            ]);
    }

    public function testSingleProductPostMethod()
    {
        $product = [
            'title' => 'Test item',
            'price' => 2.50
        ];
        $this->json('POST', 'http://gogshop.local/api/product', $product)
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "title",
                    "price"
                ],
            ]);
    }

    public function testSingleProductPutMethod()
    {
        $product = [
            'product_id' => 1,
            'title' => 'Test Game',
            'price' => 2.50
        ];
        $this->json('PUT', 'http://gogshop.local/api/product', $product)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    'id' => 1,
                    'title' => 'Test Game',
                    'price' => '2.5 USD'
                ]
            ]);
    }
}
