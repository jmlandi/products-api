<?php

namespace App\Http\Controllers;

use App\Dto\CreateProductJobDto;
use App\Dto\UpdateProductAvailabilityJobDto;
use App\Dto\UpdateProductBrandJobDto;
use App\Dto\UpdateProductDescriptionJobDto;
use App\Dto\UpdateProductNameJobDto;
use App\Dto\UpdateProductPriceJobDto;
use App\Dto\UpdateProductSkuJobDto;
use App\Jobs\CreateProductjob;
use App\Jobs\UpdateProductAvailabilityJob;
use App\Jobs\UpdateProductBrandJob;
use App\Jobs\UpdateProductDescriptionJob;
use App\Jobs\UpdateProductNameJob;
use App\Jobs\UpdateProductPriceJob;
use App\Jobs\UpdateProductSkuJob;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateProductJobDto(
            sku: $request->input('sku'),
            name: $request->input('name'),
            description: $request->input('description'),
            brand_id: $request->input('brand_id'),
            price: $request->input('price'),
            is_active: $request->input('is_active'),
        );
        CreateProductjob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateAvailability(Request $request)
    {
        $data = new UpdateProductAvailabilityJobDto(
            id: $request->input('id'),
            is_active: $request->input('is_active'),
        );
        UpdateProductAvailabilityJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateBrand(Request $request)
    {
        $data = new UpdateProductBrandJobDto(
            id: $request->input('id'),
            brand_id: $request->input('brand_id'),
        );
        UpdateProductBrandJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateDescription(Request $request)
    {
        $data = new UpdateProductDescriptionJobDto(
            id: $request->input('id'),
            description: $request->input('description'),
        );
        UpdateProductDescriptionJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateName(Request $request)
    {
        $data = new UpdateProductNameJobDto(
            id: $request->input('id'),
            name: $request->input('name'),
        );
        UpdateProductNameJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updatePrice(Request $request)
    {
        $data = new UpdateProductPriceJobDto(
            id: $request->id,
            price: $request->price,
        );
        UpdateProductPriceJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateSku(Request $request)
    {
        $data = new UpdateProductSkuJobDto(
            id: $request->id,
            sku: $request->sku,
        );
        UpdateProductSkuJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);

    }
}
