<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    function productVariation()
    {
        return $this->belongsToMany(
            ProductVariation::class,
            'product_variation_images',
            'image_id',
            'product_variation_id'
        );
    }
}
