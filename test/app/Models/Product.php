<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'picture',
    ];
    
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
