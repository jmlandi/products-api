<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'color_id', 'id');
    }
}
