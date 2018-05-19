<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        $this->addItemToCart();

    }

    private function addItemToCart(){
        $product = [
            'cart_id' => 2,
            'product_id' => 1,
            'quantity' => 2
        ];

        $this->json('PUT', 'http://gogshop.local/api/cart', $product);
    }
}
