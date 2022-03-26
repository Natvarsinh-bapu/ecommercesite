<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";

    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'user_id',
        'quantity',
        'product_price',
        'product_price_total',
        'discount',
        'tax',
        'shipping_charge',
        'address',
        'phone'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
