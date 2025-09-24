<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
}
