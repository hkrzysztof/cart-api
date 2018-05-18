<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'created_at', 'updated_at'
    ];

    public function carts() {
        return $this->belongsToMany('App\Cart');
    }
}
