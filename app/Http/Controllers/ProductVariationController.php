<?php

namespace App\Http\Controllers;

use App\Dto\CreateProductVariationJobDto;
use App\Jobs\CreateProductVariationJob;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateProductVariationJobDto(
            product_id: $request->input('product_id'),
            color_id: $request->input('color_id'),
            child_sku: $request->input('child_sku'),
            size: $request->input('size'),
            is_active: $request->input('is_active'),
        );
        CreateProductVariationJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }
}
