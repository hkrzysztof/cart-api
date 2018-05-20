
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
