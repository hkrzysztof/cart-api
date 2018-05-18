<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
                ["title" => "Fallout", "price" => 1.99, "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s') ],
                ["title" => "Don't Starve", "price" => 2.99,  "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s') ],
                ["title" => "Baldur's Gate", "price" => 3.99, "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s') ],
                ["title" => "Icewind Dale", "price" => 4.99,  "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s') ],
                ["title" => "Bloodborne", "price" => 5.99,  "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s') ]
        ]);
    }
}
