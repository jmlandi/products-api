<?php

namespace App\Http\Controllers;

use App\Dto\AttachProductVariationImagesJobDto;
use App\Dto\CreateProductVariationJobDto;
use App\Dto\DetachProductVariationImagesJobDto;
use App\Dto\UpdateProductVariationAvailabilityJobDto;
use App\Dto\UpdateProductVariationChildSkuJobDto;
use App\Dto\UpdateProductVariationColorJobDto;
use App\Jobs\AttachProductVariationImagesJob;
use App\Jobs\CreateProductVariationJob;
use App\Jobs\DetachProductVariationImagesJob;
use App\Jobs\UpdateProductVariationAvailabilityJob;
use App\Jobs\UpdateProductVariationChildSkuJob;
use App\Jobs\UpdateProductVariationColorJob;
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

    public function updateAvailability(Request $request)
    {
        $data = new UpdateProductVariationAvailabilityJobDto(
            id: $request->input('id'),
            is_active: $request->input('is_active'),
        );
        UpdateProductVariationAvailabilityJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateChildSku(Request $request)
    {
        $data = new UpdateProductVariationChildSkuJobDto(
            id: $request->id,
            child_sku: $request->child_sku,
        );
        UpdateProductVariationChildSkuJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateColor(Request $request)
    {
        $data = new UpdateProductVariationColorJobDto(
            id: $request->id,
            color_id: $request->color_id,
        );
        UpdateProductVariationColorJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function attachImage(Request $request)
    {
        $data = new AttachProductVariationImagesJobDto(
            id: $request->id,
            image_id: $request->image_id,
        );
        AttachProductVariationImagesJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function detachImage(Request $request)
    {
        $data = new DetachProductVariationImagesJobDto(
            id: $request->id,
            image_id: $request->image_id,
        );
        DetachProductVariationImagesJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

}
