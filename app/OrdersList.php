<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersList extends Model
{
    protected $table = "orders_lists";

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'order_id',
        'status'
    ];

    public function orders(){
        return $this->hasMany(Orders::class, 'order_id', 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
