# CART API

## Introduction

This application consists of 2 APIS: Products and Carts joined by Many To Many relationship. It was built fully in Laravel 5.6. PHPunit tests include 13 tests and 26 assertions.


## Getting started
1. Make sure you have Composer (https://getcomposer.org/)
2. Run in terminal ```composer global require "laravel/installer ```
3. Download this repository and unzip to your web server /public folder
4. Create database
4. Open .env.example file, rename it to .env and:
    ```a) Run ```php artisan key:generate``` in your terminal
    b) Put the obtained key in APP_KEY
    c) Fill in DB_DATABASE, DB_USERNAME, DB_PASSWORD```
5. run ```npm install``` in the app folder terminal to install all dependencies
6. Ready to use
7. To seed all database migrations and run tests use ```./vendor/bin/phpunit``` from your app direction


## Routes

```
| Method | URI              | Description                          | Header                         | Body                                |
+----------+------------------+---------------------------------------------------------------------+-------------------------------------+
| POST   | api/product      | Creates a new product                | Content-Type →application/json | 'title', 'price'                    |
| PUT    | api/product      | Updates a single product             | Content-Type →application/json | 'product_id', 'title', 'price'      |
| GET    | api/product/{id} | Shows a single product               |                                |                                     |
| DELETE | api/product/{id} | Deletes a product                    |                                |                                     |
| GET    | api/products     | Shows a list of all products         |                                |                                     |
| PUT    | api/cart         | Updates cart (add/change products)   | Content-Type →application/json | 'cart_id', 'product_id', 'quantity' |
| POST   | api/cart         | Adds a new product to a cart         | Content-Type →application/json | 'cart_id', 'product_id', 'quantity' |
| DELETE | api/cart         | Deletes a product from a cart        | Content-Type →application/json | 'cart_id', 'product_id'             |
| GET    | api/cart/{id}    | Show a single cart with it's content |                                |                                     |
| DELETE | api/cart/{id}    | Deletes a cart                       |                                |                                     |
| GET    | api/carts        | Shows a list of all carts            |                                |                                     |
```

## Error Codes
200 - OK
201 - Created
403 - Forbidden
