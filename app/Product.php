<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = [
        'image_url'
    ];

    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [        
        'name',
        'short_desc',
        'price',
        'price_display',
        'special_label',
        'label_type',
        'description',
        'image',
        'status',
        'best_seller',
    ];

    public function getImageUrlAttribute(){
        return url('storage').'/product_images/'.$this->image;
    }

    public function categories(){
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
