<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $appends = [
        'image_url'
    ];
    
    protected $table = 'product_images';

    public $timestamps = true;

    protected $fillable = [        
        'product_id',
        'image'
    ];

    public function getImageUrlAttribute(){
        return url('storage').'/product_images/'.$this->image;
    }
}
