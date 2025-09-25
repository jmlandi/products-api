<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    function stocks()
    {
        return $this->hasOne(Stock::class, 'product_variation_id', 'id');
    }

    function images()
    {
        return $this->belongsToMany(
            Image::class,
            'product_variation_images',
            'product_variation_id',
            'image_id'
        );
    }
}
