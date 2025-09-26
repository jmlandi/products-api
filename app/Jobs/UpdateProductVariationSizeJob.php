<?php

namespace App\Jobs;

use App\Dto\UpdateProductVariationSizeJobDto;
use App\Models\ProductVariation;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductVariationSizeJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductVariationSizeJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->size . $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        if ($productVariation)
        {
            $productVariation->size = trim($this->payload->size);
            $productVariation->save();
        }
    }
}
