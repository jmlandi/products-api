<?php

namespace App\Jobs;

use App\Dto\UpdateProductVariationChildSkuJobDto;
use App\Models\ProductVariation;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductVariationChildSkuJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductVariationChildSkuJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->child_sku;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        if ($productVariation)
        {
            $productVariation->child_sku = $this->payload->child_sku;
            $productVariation->save();
        }
    }
}
