<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }
}
