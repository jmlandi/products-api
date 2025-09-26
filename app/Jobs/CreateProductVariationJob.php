<?php

namespace App\Jobs;

use App\Dto\CreateProductVariationJobDto;
use App\Models\ProductVariation;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class CreateProductVariationJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateProductVariationJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->child_sku;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $payload = $this->payload;

        DB::transaction(function () use ($payload) {
            $productVariation = new ProductVariation();
            $productVariation->product_id = $payload->product_id;
            $productVariation->color_id = $payload->color_id;
            $productVariation->child_sku = $payload->child_sku;
            $productVariation->size = $payload->size;
            $productVariation->is_active = $payload->is_active;
            $productVariation->save();

            $stock = new Stock();
            $stock->product_variation_id = $productVariation->id;
            $stock->quantity_total = 0;
            $stock->quantity_reserved = 0;
            $stock->save();
        });
    }
}
