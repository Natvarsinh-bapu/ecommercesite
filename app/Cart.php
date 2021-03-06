<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_id'
    ];
}
